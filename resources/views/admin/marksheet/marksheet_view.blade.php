@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Grade</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Grade</h3>
                        </div>
                    </div>
                    <div class="card-body">
                      <div style="border: 3px solid #000">
                        <div class="row">
                            <div class="col-md-4 text-center;" style="float: right" >
                               <img style="width: 120px;height:120px;float: right" src="{{ url('upload/school-logo.jpg') }}" alt=""> 
                            </div>
                            <div class="col-md-4 text-center" style="float: left">
                                <h4><strong>High school </strong></h4>
                                <h6><strong>Dhaka ,Farmgate</strong></h6>
                                <h5><strong><u><li style="list-style: none">Academic Transcript</li></u></strong></h5>
                                <h6><strong>{{ $allMarks[0]->exam->name }}</strong></h6>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <hr style="width:100%;height:3px;background:#000;margin-bottom:0px;">
                                <p style="text-align: right"><u><i>Print Date : </i> {{ date('Y-m-d') }}</u></p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                @php
                                    $assing_student = App\Models\AssingStudent::where('year_id',$allMarks[0]->year_id)->where('class_id',$allMarks[0]->class_id)->first();
                                @endphp
                                <table class="table bordered" border="1" width="100%" cellpadding="9" cellspacing="2">
                                    <tr>
                                        <th width="50%">Student Id : </th>
                                        <td width="50%">{{ $allMarks[0]->id_no  }}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Roll no</td>
                                        <td width="50%">{{ $assing_student->roll  }}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Student name</td>
                                        <td width="50%">{{ $allMarks[0]->user->name  }}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Class</td>
                                        <td width="50%">{{ $allMarks[0]->student_class->name  }}</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Session</td>
                                        <td width="50%">{{ $allMarks[0]->year->name  }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                @php
                                    $assing_student = App\Models\AssingStudent::where('year_id',$allMarks[0]->year_id)->where('class_id',$allMarks[0]->class_id)->first();
                                @endphp
                                <table width="100%" class="text-center" cellpadding="1" cellspacing="1" border="1">
                                    <thead>
                                        <tr>
                                            <th>Letter Grade</th>
                                            <th>Marks Interval</th>
                                            <th>Grade point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allGrade as $mark)
                                        <tr>
                                          <td>{{ $mark->grade_name }}</td>
                                          <td>{{ $mark->start_marks }} - {{ $mark->end_marks }}</td>
                                          <td>{{ number_format((float)$mark->grade_point,2) }} - {{ ($mark->end_point==5)? (number_format((float)$mark->grade_point,2)):(number_format((float)$mark->grade_point+1,2) - (float)0.01) }}</td>
                                        </tr> 
                                        @endforeach
                                    </tbody>                                  
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table width="100%" border="1" cellpadding="1" cellspacing="1" class="">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SL</th>
                                            <th class="text-center">Subjects</th>
                                            <th class="text-center">Full marks</th>
                                            <th class="text-center">Get marks</th>
                                            <th class="text-center">Letter Grade</th>
                                            <th class="text-center">Grade points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total_marks = 0;
                                            $total_points = 0;
                                        @endphp
                                        @foreach ($allMarks as $key=> $mark)
                                            @php
                                                $get_marks = $mark->marks;
                                                $total_marks = (float)$total_marks + (float)$get_marks;
                                                $total_subject = App\Models\StudentMarks::where('year_id',$mark->year_id)->where('class_id',$mark->class_id)->where('id_no',$mark->id_no)->where('exam_type_id',$mark->exam_type_id)->where('student_id',$mark->student_id)->get()->count();
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $key+1 }}</td>
                                                <td class="text-center">{{ $mark->assing_subject->subject_name->name }}</td>
                                                <td class="text-center">{{ $mark->assing_subject->full_mark }}</td>
                                                <td class="text-center">{{ $get_marks }}</td>
                                                @php
                                                $grade_mark = App\Models\Grade::where([['start_marks','<=',(int)$get_marks],['end_marks','>=',(int)$get_marks]])->first();
                                                $grade_name = $grade_mark->grade_name;
                                                $grade_point = number_format((float)$grade_mark->grade_point,2);
                                                $total_points = (float)$total_points + (float)$grade_point;
                                                @endphp
                                                <td class="text-center">{{ $grade_name }}</td>
                                                <td class="text-center">{{ $grade_point}}</td>
                                                
                                            </tr>
                                        @endforeach
                                        <hr><hr>
                                        <tr style="border-top:3px solid #000">
                                            <td colspan="3">
                                                <strong style="margin-left: 10px;">Totall marks</strong>
                                            </td>
                                            <td colspan="3">
                                                <strong style="margin-left: 90px;">{{ $total_marks }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table width="100%" border="1" cellpadding="1" cellspacing="1" class="">
                                    <tbody>
                                        @php
                                            $total_grade = 0;
                                            $point_for_letter_grade = (float)$total_points/(float)$total_subject;
                                            $total_grade =App\Models\Grade::where([['start_point','<=',(int)$point_for_letter_grade],['end_point','>=',(int)$point_for_letter_grade]])->first();
                                            $total_point_avg = (float)$total_points/(float)$total_subject;

                                        @endphp
                                        <tr>
                                            <td width="50%">Grade point avg</td>
                                           <td width="50%">
                                            @if ($count_fail>0)
                                                0.00                                                                 
                                            @else
                                                {{ number_format((float)$total_point_avg,2) }}
                                            @endif
                                           </td>
                                        </tr>

                                        <tr>
                                            <td width="50%">Letter Grade</td>
                                           <td width="50%">
                                            @if ($count_fail>0)
                                                F                                                               
                                            @else
                                                {{ $total_grade->grade_name }}
                                            @endif
                                           </td>
                                        </tr>

                                        <tr>
                                           <td width="50%">Totall marks with fraction </td>
                                           <td width="50%">
                                            {{ $total_marks }}
                                           </td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table width="100%" border="1" cellpadding="1" cellspacing="1" class="">
                                    <tbody>
                                        <tr>
                                            <td width="50%">Letter Grade</td>
                                           <td width="50%">
                                            @if ($count_fail>0)
                                                Fail                                                           
                                            @else
                                                {{ $total_grade->remarks }}
                                            @endif
                                           </td>
                                        </tr>
                                    </tbody>
                                </table>

                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <hr style="border:#000 solid 1px; width:60%; margin-bottom:-6px;">
                                <div>Teacher</div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <hr style="border:#000 solid 1px; width:60%; margin-bottom:-6px;">
                                <div >Guardient/Perants</div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <hr style="border:#000 solid 1px; width:60%; margin-bottom:-6px;">
                                <div>Head teacher/Principal</div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                </div>
            </div>
                
                
        </div>
    </div>
</main>
@endsection