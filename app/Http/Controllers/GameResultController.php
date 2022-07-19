<?php

namespace App\Http\Controllers;

use App\Models\GameResult;
use App\Http\Requests\StoreGameResultRequest;
use App\Http\Requests\UpdateGameResultRequest;
use App\Models\SessionGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $session= $request->session;
        $session_game = SessionGame::create([

            "state_session_game_id" => $session['state_session_game_id'],
            "group_id" => $session['group_id'],
            "student_id" => $session['student_id']
        ]);

        foreach($request->game_results as $game_results){
            GameResult::create([
                "session_game_id"=>$session_game->id,
                "game_id"=>$game_results['game_id'],
                "game_option_id"=>$game_results['game_option_id']
            ]);
        };

        return response()->json([
            'message' => "Game result saved"
        ]);
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameResult  $gameResult
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // $queryResult = DB::select('CALL `usaschool`.`GetAllGamesResults`(?,?)', ["2022-07-15",21]);

        // $result = collect($queryResult);

        // return $result;
    }

    public function GameResultsReport(Request $request)
    {
        $queryResult = DB::select('CALL `usaschool`.`GetAllGamesResults`(?,?)', ["2022-07-15",21]);

        $result = collect($queryResult);

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameResult  $gameResult
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

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
