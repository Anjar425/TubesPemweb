<?php

namespace App\Http\Controllers;

use App\Exports\PlantsExport;
use App\Imports\PlantsImport;
use App\Models\Classes;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PlantsExportPdf;
use Mpdf\Mpdf;

class PlantController extends Controller
{
    public function index()
    {
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
        $request->validate([
            'name' => 'required|string|max:255',
            'leaf_width' => 'required|numeric',
            'class_id' => 'required|integer',
            'image' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'height' => 'required|numeric',
            'diameter' => 'required|numeric',
            'leaf_color' => 'required|string|max:255',
            'watering_frequency' => 'required|string|max:255',
            'light_intensity' => 'required|integer',
        ]);


        $regionalAdminId = Auth::guard('regadmin')->user()->id;



            // Create a new Plant instance and fill it with data
            $data = new Plant();
            $data->regional_admins_id = $regionalAdminId;
            $data->name = $request->name;
            $data->leaf_width = $request->leaf_width;
            $data->class_id = $request->class_id;
            $data->type = $request->type;
            $data->height = $request->height;
            $data->diameter = $request->diameter;
            $data->leaf_color = $request->leaf_color;
            $data->watering_frequency = $request->watering_frequency;
            $data->light_intensity = $request->light_intensity;

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/plants'), $imageName);
            $data->image = 'images/plants/' . $imageName;

            // Save the new plant record to the database
            $data->save();


        session()->flash('success', 'Save Data Successfully!');
        return redirect('/plants');
    }

    public function show($id)
    {
        $plant = Plant::findOrFail($id);
        return view('RegionalAdmin.Plants.detail', compact('plant'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'leaf_width' => 'required|numeric',
            'class_id' => 'required|integer',
            'image' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'height' => 'required|numeric',
            'diameter' => 'required|numeric',
            'leaf_color' => 'required|string|max:255',
            'watering_frequency' => 'required|string|max:255',
            'light_intensity' => 'required|integer',
        ]);

        $data = Plant::where('id', $id)->first();
        $data->name = $request->name;
        $data->leaf_width = $request->leaf_width;
        $data->class_id = $request->class_id;


        $data->type = $request->type;
        $data->height = $request->height;
        $data->diameter = $request->diameter;
        $data->leaf_color = $request->leaf_color;
        $data->watering_frequency = $request->watering_frequency;
        $data->light_intensity = $request->light_intensity;

        $data->save();

        session()->flash('success', 'Edit Data Successfully!');
        return redirect('/plants');
    }

    public function delete(Request $request, $id)
    {
        $data = Plant::where('id', $id)->first();
        $data->delete();
        session()->flash('success', 'Delete Data Successfully!');
        return redirect('/plants');
    }

    public function export()
    {
        return Excel::download(new PlantsExport, 'plants.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,txt', // Adjust file types as necessary
        ]);

        Excel::import(new PlantsImport, $request->file('file'));
        return redirect('/plants')->with('success', 'All good!');
    }
    
    public function exportPdf()
    {
        $userId = Auth::guard('regadmin')->user()->id;
        $plants = Plant::where('regional_admins_id', $userId)->with('plantClass')->get();

        $pdf = new Mpdf();
        $html = view('exports.plants_pdf', compact('plants'))->render();
        $pdf->WriteHTML($html);

        return $pdf->Output('plants.pdf', 'D');
    }
}
