<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lection;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Lections as LectionsResources;

class LectionController extends Controller
{
    //
    public function index()
    {
        return LectionsResources::collection(lection::paginate(25));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:lections,name|string',
            'description'=>'required|string',
        ]);
        $lection=lection::create($request->input());
        return new LectionsResources($lection);
    }
    public function show($lection)
    {
        return response()->json(lection::whereid($lection)->first(),200);
        // dd($lection);
        // return new LectionsResources($lection);
    }
    public function update(Request $request,$lection)
    {
        $rules=[
            'name'=>'required|string',
            'description'=>'required|string',
        ];
        $validator=Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }
        $lection=\App\Models\lection::whereid($lection)->first();
        $lection->name=$request->input('name');
        $request->input('description')!=null ? $lection->description=$request->input('description') :'';
        $lection->save();
        return response()->json($lection,200);
    }
    public function destroy($lection)
    {
        \App\Models\lection::whereid($lection)->delete();
        return response()->json('deleted',200);
    }
}
