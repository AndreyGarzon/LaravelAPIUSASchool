<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Group;
use App\Models\User;
class StudentController extends Controller
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
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
            Student::insert($request->data);
            return response()->json(
                [   'message'=>'Student created succesfully',
                    'data'=>$request->data],
                status:201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student =  Student::where('group_id',$id)->get();
        return $student;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());
        return response()->json(
            [   'message'=>'Student updated succesfully',
                'data'=>$student],
            status:200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response('',204);
    }

    
    public function deleteAll(Request $request)
    {

        foreach($request->all() as $student){
            Student::destroy($student['id']);
        }

        // return response()->json($users->id);
                return response('',204);
    }

    public function userStudents()
    {
        $student =  User::select('students.*')                                        
                    ->join('teachers','users.id','=','teachers.user_id')
                    ->join('groups','teachers.id','=','groups.teacher_id')
                    ->join('students','groups.id','=','students.group_id')->get();
        return $student;

    }
}
