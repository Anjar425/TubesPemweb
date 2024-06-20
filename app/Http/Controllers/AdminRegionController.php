<?php

namespace App\Http\Controllers;

use App\Exports\RegionalAdminsExport;
use App\Imports\RegionalAdminsImport;
use App\Models\Administrator;
use App\Models\Region;
use App\Models\RegionalAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\RegionAdminImport;
use App\Exports\RegionAdminExport; // Import class eksport yang sudah dibuat
use Maatwebsite\Excel\Facades\Excel; // Import facade Excel


class AdminRegionController extends Controller
{
    public function index()
    {
        if (Auth::guard('administrators')->check()) {
            $userId = Auth::guard('administrators')->user()->id;
            $region = Region::where('administrator_id', $userId)->get();
            $RegionalAdmin = RegionalAdmin::where('administrator_id', $userId)
                ->with('region')
                ->get();
            return view('Admininistrator.RegionalAdmin.index', compact('RegionalAdmin', 'region'));
        } else {
            return redirect("/")->withErrors('You are not allowed to access');
        }
    }

    public function insert(Request $request)
    {
        $existingEmail = Administrator::where('email', $request->email)->first();

        if ($existingEmail) {
            session()->flash('fail', 'Save Data Failed!');
            return redirect('/region-admin');
        }

        $userId = Auth::guard('administrators')->user()->id;

        $data = new RegionalAdmin();

            $data->name = $request->name;
            $data->administrator_id = $userId;
            $data->region_id = $request->regions_id;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->visible_password = $request->password;


        $data->save();
        session()->flash('success', 'Save Data Successfully!');
        return redirect('/region-admin');
    }

    public function update(Request $request, $id)
    {



        $data = RegionalAdmin::where('id', $id)->first();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->visible_password = $request->password;
            $data->region_id = $request->regions_id;
        $data -> save();
      
        session()->flash('success', 'Edit Data Successfully!');
        return redirect('/region-admin');
    }

    public function delete(Request $request, $id)
    {
        $data = RegionalAdmin::findOrFail($id);
        $data->delete();
        session()->flash('success', 'Delete Data Successfully!');
        return redirect('/region-admin');
    }

    public function export()
    {
        $userId = Auth::guard('administrators')->user()->id;
        $fileName = 'regional_admins_' . date('Ymd_His') . '.xlsx';

        return Excel::download(new RegionAdminExport($userId), $fileName);

    }

    public function import(Request $request)
    {
    $request->validate([
        'file' => 'required|mimes:xlsx,xls|max:2048' // Validate file type
    ]);

    try {
        Excel::import(new RegionAdminImport(), $request->file('file'));
        
        // Jika berhasil, tampilkan pesan sukses dan redirect kembali
        return redirect('/region-admin')->with('success', 'Data imported successfully!');
    } catch (\Exception $e) {
        // Jika terjadi error, tampilkan pesan error dan redirect kembali
        return redirect('/region-admin')->withErrors('Failed to import data: ' . $e->getMessage());
    }

    }
}
