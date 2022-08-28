<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\User;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        $teacher_id =  User::select('teachers.id')                                        
        ->join('teachers','users.id','=','teachers.user_id')->where('users.id',$request->user_id)
        ->get();


        $group = new Group;
        $group->group_name = $request->group_name;
        $group->teacher_id =  $teacher_id[0]->id;
 
        $group->save();
        return response()->json(
            [   'message'=>'Group created succesfully',
                'data'=>$group],
            status:201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $group =  User::with('group')->where('id',$id)->get();
        return $group[0]->group;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->all());
        return response()->json(
            [   'message'=>'Group updated succesfully',
                'data'=>$group],
            status:200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return response('',204);
    }
    public function deleteAll(Request $request)
    {

        foreach($request->all() as $groups){
            Group::destroy($groups['id']);
        }

        // return response()->json($users->id);
                return response('',204);
    }
}
