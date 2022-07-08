<?php

namespace App\Http\Controllers;

use App\Models\GameOption;
use App\Http\Requests\StoreGameOptionRequest;
use App\Http\Requests\UpdateGameOptionRequest;

class GameOptionController extends Controller
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
     * @param  \App\Http\Requests\StoreGameOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameOptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameOption  $gameOption
     * @return \Illuminate\Http\Response
     */
    public function show(GameOption $gameOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameOption  $gameOption
     * @return \Illuminate\Http\Response
     */
    public function edit(GameOption $gameOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGameOptionRequest  $request
     * @param  \App\Models\GameOption  $gameOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameOptionRequest $request, GameOption $gameOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameOption  $gameOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameOption $gameOption)
    {
        //
    }
}
