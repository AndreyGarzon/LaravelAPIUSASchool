<?php

namespace App\Http\Controllers;

use App\Models\GameResult;
use App\Http\Requests\StoreGameResultRequest;
use App\Http\Requests\UpdateGameResultRequest;
use Illuminate\Http\Request;

class GameResultController extends Controller
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
     * @param  \App\Http\Requests\StoreGameResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
        foreach($request->data as $data){
        $gameResult = new GameResult();
        $gameResult->school_id      = $data['school_id'];
        $gameResult->teacher_id     = $data['teacher_id'];
        $gameResult->group_id       = $data['group_id'];
        $gameResult->student_id     = $data['student_id'];
        $gameResult->game_id        = $data['game_id'];
        $gameResult->game_option_id = $data['game_option_id'];
        $gameResult->save();
        }
        return response()->json([
            'message' => "Game result saved",
 
        ]);
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameResult  $gameResult
     * @return \Illuminate\Http\Response
     */
    public function show(GameResult $gameResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameResult  $gameResult
     * @return \Illuminate\Http\Response
     */
    public function edit(GameResult $gameResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGameResultRequest  $request
     * @param  \App\Models\GameResult  $gameResult
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameResultRequest $request, GameResult $gameResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameResult  $gameResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(GameResult $gameResult)
    {
        //
    }
}
