<?php

namespace App\Http\Controllers;

use App\Models\InfoGym;
use App\Http\Requests\StoreInfoGymRequest;
use App\Http\Requests\UpdateInfoGymRequest;

class InfoGymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Info Gym';

        return view('pages.info_gym.form', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInfoGymRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InfoGym $infoGym)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InfoGym $infoGym)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInfoGymRequest $request, InfoGym $infoGym)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InfoGym $infoGym)
    {
        //
    }
}
