<?php

namespace App\Http\Controllers;

use App\Exports\ClassesExport;
use App\Exports\ClassesExportPdf;
use App\Imports\ClassesImport;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ClassesController extends Controller
{
    public function index(){
        if (Auth::guard('regadmin')->check()) {
            $userId = Auth::guard('regadmin')->user()->id;
            $class = Classes::where('regional_admins_id', $userId)->get();
            return view('RegionalAdmin.Classes.index', compact('class'));
        } else {
            return redirect("/")->withErrors('You are not allowed to access');
        }
    }

    public function insert(Request $request){
        $existingData = Classes::where('id', $request->id)->first();

        if ($existingData) {
            session()->flash('fail', 'Save Data Failed!');
            return redirect('/class');
        } else {

            $regionalAdminId = Auth::guard('regadmin')->user()->id;

            $data = new Classes();
            $data->regional_admins_id = $regionalAdminId;
            $data->name = $request->name;

            $data->save();
            session()->flash('success', 'Save Data Successfully!');
            return redirect('/class');
        }
    }

    public function update(Request $request, $id)
    {
        $data = Classes::where('id', $id)->first();
        $data->name = $request->name;

        $data->save();
        session()->flash('success', 'Edit Data Successfully!');
        return redirect('/class');
    }

    public function delete(Request $request, $id)
    {
        $data = Classes::where('id', $id);
        $data->delete();
        session()->flash('success', 'Delete Data Successfully!');
        return redirect('/class');
    }

    public function export()
    {
        return Excel::download(new ClassesExport, 'classes.xlsx');
    }

    public function exportPdf()
    {
        $exporter = new ClassesExportPdf();
        return $exporter->generatePdf();
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,txt', // Adjust file types as necessary
        ]);

        Excel::import(new ClassesImport, $request->file('file'));
        return redirect('/class')->with('success', 'All good!');
    }
}
