<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\File;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{
    public function upload_banner_sm(Request $request)
    {
 
       $validator = Validator::make($request->all(),[ 
        'file'  => 'required|mimes:png,jpg,jpeg,gif|max:2048',

        ]);   
 
        if($validator->fails()) {          
            
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  
 
  
        if ($file = $request->file('file')) {


            $path = $file->store('public/files/banner-sm');
            $name = $file->getClientOriginalName();
 
            //store your file into directory and db
            $save = new File();
            $save->name = $name;
            $save->path= $path;
            $save->save();
              
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $name
            ]);
  
        }
 
  
    }
}