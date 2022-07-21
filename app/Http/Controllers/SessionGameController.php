<?php

namespace App\Http\Controllers;

use App\Models\SessionGame;
use App\Http\Requests\StoreSessionGameRequest;
use App\Http\Requests\UpdateSessionGameRequest;
use App\Models\GameResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function show($id)
    {
        // $session_games =  SessionGame::with('')->where('state_session_game_id','2')->where('teacher_id',$id)->get();
        $session_games =  User::select(DB::raw("CONCAT(students.first_name,' ',students.last_name) student_name"),'students.group_id','groups.group_name','session_games.*')
                                        ->join('teachers','users.id','=','teachers.user_id')
                                        ->join('groups','teachers.id','=','groups.teacher_id')
                                        ->join('students','groups.id','=','students.group_id')
                                        ->join('session_games','students.id','=','session_games.student_id')
                                        ->where('session_games.state_session_game_id','2')->where('users.id',$id)->get();
        
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
    public function destroy(SessionGame $sessiongame)
    {
        
        $sessiongame->delete();
        return response('',204);
    }
}
