<?php

namespace App\Http\Controllers;

use App\Models\SessionGame;
use App\Http\Requests\StoreSessionGameRequest;
use App\Http\Requests\UpdateSessionGameRequest;
use App\Models\GameResult;
use Illuminate\Http\Request;

class SessionGameController extends Controller
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
     * @param  \App\Http\Requests\StoreSessionGameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSessionGameRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SessionGame  $sessionGame
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $session_games =  SessionGame::where('state_session_game_id','2')->get();
        return $session_games;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SessionGame  $sessionGame
     * @return \Illuminate\Http\Response
     */
    public function edit(SessionGame $sessionGame)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSessionGameRequest  $request
     * @param  \App\Models\SessionGame  $sessionGame
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSessionGameRequest $request, SessionGame $sessionGame)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SessionGame  $sessionGame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $session = SessionGame::findOrFail($request->session_game_id);
        $state = $session["state_session_game_id"];

        if ($state == 2) {
            
            SessionGame::destroy([
                $request->session_game_id
            ]);

            return response()->json([
                'message' => "Game result deleted",
                'session_game_id'=>$request->session_game_id
            ]);
        }
        else {
            return response()->json([
                'message' => "Cannot be deleted because its a complete game register.",
            ],status: 422) ;
        }
    }
}
