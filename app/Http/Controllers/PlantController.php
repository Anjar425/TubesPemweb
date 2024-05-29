<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    public function index() {
        if (Auth::guard('regadmin')->check()) {
            $userId = Auth::guard('regadmin')->user()->id;
            $plant = Plant::where('regional_admins_id', $userId)->get();
            return view('RegionalAdmin.Plants.index', compact('plant'));
        } else {
            return redirect("/")->withErrors('You are not allowed to access');
        }
    }
}
