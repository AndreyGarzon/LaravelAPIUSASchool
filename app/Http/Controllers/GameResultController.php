<?php

namespace App\Http\Controllers;

use App\Models\GameResult;
use App\Http\Requests\StoreGameResultRequest;
use App\Http\Requests\UpdateGameResultRequest;
use App\Models\GameGroup;
use App\Models\SessionGame;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
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
        //
    }

    public function create_session_game_result(Request  $request)
    {
        $session= $request->session;
        $session_game = SessionGame::create([

            "state_session_game_id" => $session['state_session_game_id'],
            "student_id" => $session['student_id'],

        ]);

        foreach($request->game_results as $game_results){
            GameResult::create([
                "session_game_id"=>$session_game->id,
                "game_id"=>$game_results['game_id'],
                "game_option_id"=>$game_results['game_option_id'],
                "priority"=>$game_results['priority'],
            ]);
        };

        return response()->json([
            $session_game
        ],status:201);
    

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GameResult  $gameResult
     * @return \Illuminate\Http\Response
     */
    

    public function show($id)
    {
        $game_results =  GameResult::select('game_results.*','games.game_name')->join('games','game_results.game_id','games.id')->where('session_game_id',$id)->orderBy('priority', 'ASC')->get();
        return $game_results;
    }

    public function report(Request $request)
    {
        try {
            $queryResult = DB::select('CALL `usaschool`.`GetAllGamesResults`(?,?,?)', [$request->date,$request->group_id,$request->report_id]);
            $result = collect($queryResult);
            $game_name =  GameGroup::select('game_groups.game_group_name')->where('id',$request->report_id)->get();

            $first_result = (array)$result[0];

            $headers =  array_keys($first_result);



            return response ()->json(
                [
                    'Title'=>$game_name[0]['game_group_name'],
                    'headers'=>$headers,
                    'data'=>$result
                ]
                );


        } catch (\Exception  $e) {
            return response()->json([
            ],status:200);
        }



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GameResult  $gameResult
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
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
    public function update_session_game_result(Request $request)
    {
        $session= $request->session;
        $session_game=SessionGame::find($session['session_game_id']);
        $session_game->update([
            "state_session_game_id" => $session['state_session_game_id']
        ]);

        foreach($request->game_results as $game_results){
            $result=GameResult::find($game_results['game_result_id']);
            $result->update([
                // "game_id"=>$game_results['game_id'],
                "game_option_id"=>$game_results['game_option_id']
            ]);
        };

        return $session_game;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GameResult  $gameResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

    }
}
