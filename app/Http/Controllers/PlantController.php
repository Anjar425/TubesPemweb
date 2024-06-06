<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    public function index() {
        if (Auth::guard('regadmin')->check()) {
            $userId = Auth::guard('regadmin')->user()->id;
            $classes = Classes::where('regional_admins_id', $userId)->get();
            $plant = Plant::where('regional_admins_id', $userId)->with('plantClass')->get();
            return view('RegionalAdmin.Plants.index', compact('plant', 'classes'));
        } else {
            return redirect("/")->withErrors('You are not allowed to access');
        }
    }

    public function insert(Request $request)
    {
        // Check if plant with the given ID already exists
        $existingData = Plant::where('id', $request->id)->first();

        if ($existingData) {
            session()->flash('fail', 'Save Data Failed! Plant with this ID already exists.');
            return redirect('/plants');
        } else {
            // Get the authenticated regional admin's ID
            $regionalAdminId = Auth::guard('regadmin')->user()->id;

            // Create a new Plant instance and fill it with data
            $data = new Plant();
            $data->regional_admins_id = $regionalAdminId;
            $data->name = $request->name;
            $data->leaf_width = $request->leaf_width;
            $data->class_id = $request->class_id;
            $data->image = $request->image;
            $data->type = $request->type;
            $data->height = $request->height;
            $data->diameter = $request->diameter;
            $data->leaf_color = $request->leaf_color;
            $data->watering_frequency = $request->watering_frequency;
            $data->light_intensity = $request->light_intensity;

            // Save the new plant record to the database
            $data->save();

            session()->flash('success', 'Save Data Successfully!');
            return redirect('/plants');
        }
    }

    public function update(Request $request, $id)
    {
        $data = Plant::where('id', $id)->first();
            $data->name = $request->name;
            $data->leaf_width = $request->leaf_width;
            $data->class_id = $request->class_id;
            $data->image = $request->image;
            $data->type = $request->type;
            $data->height = $request->height;
            $data->diameter = $request->diameter;
            $data->leaf_color = $request->leaf_color;
            $data->watering_frequency = $request->watering_frequency;
            $data->light_intensity = $request->light_intensity;

        $data -> save();
        session()->flash('success', 'Edit Data Successfully!');
        return redirect('/plants');
    }

    public function delete(Request $request, $id)
    {
        $data = Plant::where('id', $id);
        $data->delete();
        session()->flash('success', 'Delete Data Successfully!');
        return redirect('/plants');
    }
}
