@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Static Navigation</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Student fee <a href="{{ route('student.fee.add') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-plus-circle"></i> Student fee   
                            </a></h3>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="2%">SL</th>
                                    <th>ID no.</th>
                                    <th>Name</th>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>Fee type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key => $class)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $class->user->id_no }}</td> 
                                        <td>{{ $class->user->name }}</td> 
                                        <td>{{ $class->year->name }}</td>  
                                        <td>{{ $class->student_class->name }}</td>  
                                        <td>{{ $class->fee->name }}</td>  
                                        <td>{{ $class->amount }}</td>  
                                        <td>{{ $class->date }}</td> 
                                        
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    
                </div>
            </div>
                
                
        </div>
    </div>
</main>

@endsection