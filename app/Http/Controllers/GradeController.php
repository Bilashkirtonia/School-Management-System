<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
   public function index(){
      $data['Grades'] = Grade::all();
    return view('admin.grade.grade_view',$data);
   }

   public function add(){
    return view('admin.grade.grade_add');
   }
   						
   public function store(Request $request){
      $data = new Grade();
      $data->grade_name = $request->grade_name;
      $data->grade_point = $request->grade_point;
      $data->start_marks = $request->start_marks;
      $data->end_marks = $request->end_marks;
      $data->start_point = $request->start_point;
      $data->end_point = $request->end_point;
      $data->remarks = $request->remarks;
      $data->save();
      return redirect()->route('student.grade.view')->with('success','Data insert successfully');
     }
}
