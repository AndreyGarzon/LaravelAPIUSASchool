<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAccessRequest;
use App\Http\Requests\UpdateUserAccessRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserAccessController extends Controller
{
    public function index()
    {
        if(Auth()->user()->role_id ==1){
            $user = User::select('users.id','users.role_id','users.first_name','users.last_name','users.email','users.email_verified_at',DB::raw("DATE_FORMAT(users.created_at, '%Y-%m-%d') created_date"),'users.updated_at','roles.role_name')
                            ->join('roles','users.role_id','roles.id')->where('users.id', '!=', auth()->id())->get();
            return $user;

        }

        elseif(Auth()->user()->role_id ==2){
            $user = User::select('users.id','users.role_id','users.first_name','users.last_name','users.email','users.email_verified_at',DB::raw("DATE_FORMAT(users.created_at, '%Y-%m-%d') created_date"),'users.update_at','roles.role_name')
            ->join('roles','users.role_id','roles.id')->where('role_id','3')->where('users.id', '!=', auth()->id())->get();
            return $user;
        }
        else {
            return abort(403, 'Not authorized');
        }
   
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return  $user;
    }

    public function store(StoreUserAccessRequest $request)
    {
        if(Auth()->user()->role_id ==1){


            $user = User::create([
                
                'role_id'=> $request->role_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->email_verified_at = now();
            $user->save();
            if($request->role_id == '3')
            {
                Teacher::create([
                    'user_id'=>$user->id
                ]);
                return response()->json(
                    $user,status:201);
            }
            else{
                return response()->json([
                    'message'=>'User created succesfully'
                ],status:201);
            } 
    }

        elseif(Auth()->user()->role_id ==2){
            
            $user = User::create([
                'role_id'=> '3',
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->email_verified_at = now();
            $user->save();

                Teacher::create([
                    'user_id'=>$user->id
                ]);

                return response()->json([
                    'message'=>'User created succesfully'
                ],status:201);
        }
        else {
            return response()->json([
                'message'=>'Not authorized'
            ],status:403);
        }
   
    }

    public function update(UpdateUserAccessRequest $request, $id)
    {

        $user = User::findOrFail($id);

        if(Auth()->user()->role_id ==1){

            if (empty($request->password)) {
        
                    $user->update([
                    
                        'role_id'=> $request->role_id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                    ]);
                    
                    return response()->json([
                        'message'=>'User updated succesfully'
                    ],status:200);
            }
            else {
                    $user->update([
                    
                        'role_id'=> $request->role_id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);
                    return response()->json([
                        'message'=>'User updated succesfully'
                    ],status:200);
            }


        } 

        elseif(Auth()->user()->role_id ==2){
            
            if (empty($request->password)) {
        
                $user->update([
                
                    'role_id'=> "3",
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                ]);
                
                return response()->json([
                    'message'=>'User updated succesfully'
                ],status:200);

        }
        else {
                $user->update([
                
                    'role_id'=> "3",
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                return response()->json([
                    'message'=>'User updated succesfully'
                ],status:200);
        }
        }
        else {
            return response()->json([
                'message'=>'Not authorized'
            ],status:403);
        }
   
    }

    public function destroy($id)
    {
        
        User::destroy($id);
        return response('',204);
    }

    public function deleteAll(Request $request)
    {

        foreach($request->all() as $users){
            User::destroy($users['id']);
        }
        // return response()->json($users->id);
        return response('',204);

    }



}
