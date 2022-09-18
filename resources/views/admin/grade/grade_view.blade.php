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
                            <h3>Grade <a href="{{ route('student.grade.add') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-plus-circle"></i> Grade add   
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body">
                    
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="2%">Id</th>
                                    <th>Grade name</th>
                                    <th>Grade point</th>
                                    <th>Start marks</th>
                                    <th>End marks</th>
                                    <th>Start point</th>
                                    <th>End points</th>
                                    <th>Remarks</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Grades as $key => $class)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $class->grade_name }}</td> 
                                        <td>{{ number_format((float)$class->grade_point,2) }}</td>  
                                        <td>{{ $class->start_marks }}</td>  
                                        <td>{{ $class->end_marks }}</td>  
                                        <td>{{ number_format((float)$class->start_point,2)}}</td>
                                        <td>{{ ($class->end_point==5)? (number_format((float)$class->grade_point,2)):(number_format((float)$class->grade_point+1,2) - (float)0.01) }}</td> 
                                        <td>{{ $class->remarks }}</td> 
                                                                                                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- @endif --}}
                    
                </div>
            </div>
                
                
        </div>
    </div>
</main>
@endsection