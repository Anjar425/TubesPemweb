<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\PlantRegion;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'region_id' => 'required'
        ]);
        
        $existingData = PlantRegion::where('plant_id', $request->plant_id)
            ->where('region_id', $request->region_id)
            ->first();

        if ($existingData) {
            session()->flash('fail', 'Data already exists!');
            return redirect('/vegetation');
        } else {

            // $regionId = Auth::guard('regadmin')->user()->region_id;


            $data = new PlantRegion();
            $data->plant_id = $request->plant_id;
            $data->region_id = $request->region_id;

            $data->save();
            session()->flash('success', 'Save Data Successfully!');
            return redirect('/vegetation');
        }

    }
    public function update(Request $request, $id)
    {
        $existingData = PlantRegion::where('plant_id', $request->plant_id)
            ->where('region_id', $request->region_id)
            ->first();

        if ($existingData) {
            session()->flash('fail', 'Data already exists!');
            return redirect('/vegetation');
        } else {
            $data = PlantRegion::where('id', $id)->first();
            $data->plant_id = $request->plant_id;
        }
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
}
