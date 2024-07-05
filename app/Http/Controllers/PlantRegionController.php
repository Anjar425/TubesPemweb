<?php

namespace App\Http\Controllers;

use App\Exports\PlantRegionsExport;
use App\Imports\PlantRegionsImport;
use App\Models\Plant;
use App\Models\PlantRegion;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Mpdf\Mpdf;


class PlantRegionController extends Controller
{
    public function index()
    {
        if (Auth::guard('regadmin')->check()) {
            $user = Auth::guard('regadmin')->user();
            $userId = $user->id;
            $administratorId = $user->administrator_id;

            $plant = Plant::where('regional_admins_id', $userId)->get();
            $region = Region::where('administrator_id', $administratorId)->get();
            $regionIds = $region->pluck('id');

            $plantRegion = PlantRegion::whereIn('region_id', $regionIds)
                ->with(['plant', 'region'])
                ->get();

            return view('RegionalAdmin.PlantRegion.index', compact('plant', 'region', 'plantRegion'));
        } else {
            return redirect("/")->withErrors('You are not allowed to access');
        }
    }


    public function insert(Request $request)
    {
        $request->validate([
            'plant_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);




        $regionId = Auth::guard('regadmin')->user()->region_id;


        $data = new PlantRegion();
        $data->plant_id = $request->plant_id;
        $data->region_id = $regionId;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;

        $data->save();
        session()->flash('success', 'Save Data Successfully!');
        return redirect('/vegetation');
    }
    public function update(Request $request, $id)
    {


        $data = PlantRegion::where('id', $id)->first();
        $data->plant_id = $request->plant_id;
        $data->latitude = $request->latitude;
        $data->longitude = $request->longitude;

        $data->save();
        session()->flash('success', 'Edit Data Successfully!');
        return redirect('/vegetation');
    }

    public function delete(Request $request, $id)
    {
        $data = PlantRegion::where('id', $id);
        $data->delete();
        session()->flash('success', 'Delete Data Successfully!');
        return redirect('/vegetation');
    }

    public function export()
    {
        return Excel::download(new PlantRegionsExport, 'plantregions.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        Excel::import(new PlantRegionsImport, $request->file('file'));

        session()->flash('success', 'Import Data Successfully!');
        return redirect('/vegetation');
    }

    public function exportPdf()
    {
        $userId = Auth::guard('regadmin')->user()->id;
        $administratorId = Auth::guard('regadmin')->user()->administrator_id;

        $regions = Region::where('administrator_id', $administratorId)->get();
        $regionIds = $regions->pluck('id');

        $plantRegions = PlantRegion::whereIn('region_id', $regionIds)->with('plant', 'region')->get();

        $pdf = new Mpdf();
        $html = view('exports.plantregions_pdf', compact('plantRegions'))->render();
        $pdf->WriteHTML($html);

        return $pdf->Output('plantregions.pdf', 'D');
    }
}
