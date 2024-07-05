<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    public function index(){
        if (Auth::guard('administrators')->check()) {
            $userId = Auth::guard('administrators')->user()->id;
            $region = Region::where('administrator_id', $userId)->get();
            return view('Admininistrator.Dashboard.index');
        } else if (Auth::guard('regadmin')->check()) {
            $userId = Auth::guard('regadmin')->user()->id;
            $region = Region::where('administrator_id', $userId)->get();
            return view('RegionalAdmin.Dashboard.index');
        } else {
            return redirect("/")->withErrors('You are not allowed to access');
        }
    }

    public function insert(Request $request){
        $existingPenduduk = Region::where('id', $request->id)->first();

        if ($existingPenduduk) {
            session()->flash('fail', 'Save Data Failed!');
            return Redirect('/region');
        } else {

        $userId = Auth::guard('administrators')->user()->id;

        $data = new Region();
            $data->name = $request->name;
            $data->administrator_id = $userId;

        $data -> save();
        session()->flash('success', 'Save Data Successfully!');
        return Redirect('/dashboard');
        }
    }
}
