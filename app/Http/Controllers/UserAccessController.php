<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAccessRequest;
use App\Http\Requests\UpdateUserAccessRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class UserAccessController extends Controller
{
    
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

                return response()->json(
                    $user,status:201);
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

                return response()->json(
                    $user,status:201);
        }
        else {
            return abort(403, 'Not authorized');
        }
   
    }

    public function update(UpdateUserAccessRequest $request, User $user)
    {
        if(Auth()->user()->role_id ==1){

            $user->update([
                
                'role_id'=> $request->role_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);


                return response()->json(
                    $user,status:200);
            } 

        elseif(Auth()->user()->role_id ==2){
            
            $user->update([
                
                'role_id'=> '3',
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);


                return response()->json(
                    $user,status:200);
        }
        else {
            return abort(403, 'Not authorized');
        }
   
    }



}
