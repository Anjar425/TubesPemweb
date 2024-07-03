<?php

namespace App\Http\Controllers;


use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RegionExport;
use App\Imports\RegionImport;
use App\Models\Coordinate;

class RegionController extends Controller
{
    public function index()
    {
        if (Auth::guard('administrators')->check()) {
            $userId = Auth::guard('administrators')->user()->id;
            $region = Region::where('administrator_id', $userId)->with('coordinates')->get();
            return view('Admininistrator.Region.index', compact('region'));
        } else {
            return redirect("/")->withErrors('You are not allowed to access');
        }
    }

    public function insert(Request $request)
    {

        $userId = Auth::guard('administrators')->user()->id;

        $data = new Region();
        $data->name = $request->name;
        $data->administrator_id = $userId;
        $data->location = $request->location;
        $data->area = $request->area;
        $data->status = $request->status;
        $data->save();



        // Mengambil data latitude dan longitude dari request
        $latitudes = $request->input('latitude');
        $longitudes = $request->input('longitude');

        // Menyimpan setiap pasangan latitude dan longitude
        foreach ($latitudes as $key => $latitude) {
            Coordinate::create([
                'region_id' => $data->id, // Sesuaikan dengan region_id yang diinginkan
                'latitude' => $latitude,
                'longitude' => $longitudes[$key],
            ]);
        }



        session()->flash('success', 'Save Data Successfully!');
        return Redirect('/region');
    }

    public function update(Request $request, $id)
    {
        $data = Region::where('id', $id)->first();
        $data->name = $request->name;
        $data->location = $request->location;
        $data->area = $request->area;
        $data->status = $request->status;

        $data->save();

        $latitudes = $request->input('latitude');
        $longitudes = $request->input('longitude');

        $coordinates = Coordinate::where('region_id', $id)->get();

        foreach ($coordinates as $coordinate) {
            $coordinate->delete();
        }

        // Menyimpan setiap pasangan latitude dan longitude
        foreach ($latitudes as $key => $latitude) {
            Coordinate::create([
                'region_id' => $id, // Sesuaikan dengan region_id yang diinginkan
                'latitude' => $latitude,
                'longitude' => $longitudes[$key],
            ]);
        }
        session()->flash('success', 'Edit Data Successfully!');
        return redirect('/region');
    }

    public function delete(Request $request, $id)
    {
        $data = Region::where('id', $id);
        $data->delete();
        session()->flash('success', 'Delete Data Successfully!');
        return redirect('/region');
    }

    public function export()
    {
        return Excel::download(new RegionExport, 'region.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new RegionImport, $request->file('file'));

        return redirect('/region')->with('success', 'All good!');
    }
}
