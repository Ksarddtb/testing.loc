<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Student as ResourcesStudent;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

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
        // return response()->json(Student::get(),200);
        return ResourcesStudent::collection(Student::paginate(25));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'name'=>'required|unique:students,name|string|max:200',
            'email'=>'required|unique:students,email|email|max:100',
            'student_class_id'=>'required|exists:student_classes,id'
        ]);
        $student=Student::create($request->input());
        return new ResourcesStudent($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        // dd($student);
        return new ResourcesStudent($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Student $student)
    {
        $rules=[
            'name'=>'required|string|max:200',
            'email'=>'required|email|max:100',
            'student_class_id'=>'required|exists:student_classes,id'
        ];
        $validator=Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }
        $student->update($request->all());
        return new ResourcesStudent($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json('deleted',200);
    }

}
