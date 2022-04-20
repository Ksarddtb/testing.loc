<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentClass as ResourceClass;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Validator;
class StudentClassController extends Controller
{

    public function index()
    {
        return ResourceClass::collection(StudentClass::paginate(25));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:student_classes,name|string|max:200',
        ]);
        $class=StudentClass::create($request->input());
        return new ResourceClass($class);
    }
    public function show(StudentClass $classroom)
    {
        return new ResourceClass($classroom);
    }
    public function update(Request $request,StudentClass $classroom)
    {
        $rules=[
            'name'=>'required|string|max:200',
        ];
        $validator=Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }
        $classroom->update($request->all());
        return new ResourceClass($classroom);
    }
    public function destroy(StudentClass $classroom)
    {
        $classroom->delete();
        return response()->json('deleted',200);
    }
    public function store_lection(Request $request,StudentClass $classroom)
    {
        $plan=new \App\Models\Studyplan();
        $plan->lection_id=$request->input('lection_id');
        $plan->student_class_id=$classroom->id;
        $plan->save();
        return new ResourceClass($classroom);
    }
    public function delete_lection(Request $request,StudentClass $classroom)
    {
        $plan=\App\Models\Studyplan::where('lection_id',$request->input('lection_id'))->where('student_class_id',$classroom->id)->delete();
        return new ResourceClass($classroom);
    }
    public function update_lection(Request $request,StudentClass $classroom)
    {
        $plan=\App\Models\Studyplan::where('lection_id',$request->input('old_lection_id'))->where('student_class_id',$classroom->id)->first();
        // dd($plan);
        $plan->lection_id=$request->input('lection_id');
        $plan->save();
        return new ResourceClass($classroom);
    }
}
