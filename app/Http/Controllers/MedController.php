<?php

namespace App\Http\Controllers;

use App\Models\Med;
use App\Http\Resources\Med as MedResource;
use Illuminate\Http\Request;

class MedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function search($med)
    {
        $this->authorize('user');
        $meds = Med::where('name', 'like', '%'. $med . '%')->get();
        return MedResource::collection($meds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Med  $med
     * @return \Illuminate\Http\Response
     */
    public function show(Med $med)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Med  $med
     * @return \Illuminate\Http\Response
     */
    public function edit(Med $med)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Med  $med
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Med $med)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Med  $med
     * @return \Illuminate\Http\Response
     */
    public function destroy(Med $med)
    {
        //
    }
}
