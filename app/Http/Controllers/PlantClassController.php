<?php

namespace App\Http\Controllers;

use App\Models\PlantClass;
use Illuminate\Http\Request;

class PlantClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(create)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PlantClass $plantClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlantClass $plantClass)
    {
        return view()
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlantClass $plantClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlantClass $plantClass)
    {
        //
    }
}
