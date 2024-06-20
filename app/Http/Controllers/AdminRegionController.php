<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Region;
use App\Models\RegionalAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRegionController extends Controller
{
    //$table->string('visible_password')

    public function index(){
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

    public function insert(Request $request){
        $existingData = RegionalAdmin::where('id', $request->id)->first();
        $existingEmail = Administrator::where('email', $request->email)->first();

        if ($existingData || $existingEmail) {
            session()->flash('fail', 'Save Data Failed!');
            return redirect('/region-admin');
        } else {

        $userId = Auth::guard('administrators')->user()->id;

        $data = new RegionalAdmin();
            $data->name = $request->name;
            $data->administrator_id = $userId;
            $data->region_id = $request->regions_id;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->visible_password = $request->password;
            

        $data -> save();
        session()->flash('success', 'Save Data Successfully!');
        return redirect('/region-admin');
        }

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
        $data = RegionalAdmin::where('id', $id);
        $data->delete();
        session()->flash('success', 'Delete Data Successfully!');
        return redirect('/region-admin');
    }
}
