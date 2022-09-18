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
                            <h3>View subject <a href="{{ route('setup.student.aasign.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-plus-circle"></i> subject list   
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4><strong>Fee category : {{ $subject_details['0']->subject_name->name }}</strong></h4>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Subject name</th>
                                    <th>Full mark</th>
                                    <th>Pass mark</th>
                                    <th>Get mark</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject_details as $key => $class)
                                    <tr>
                                        <td>{{ $key+1 }}</td>                                       
                                        <td>{{ $class->subject_name->name }}</td> 
                                        <td>{{ $class->full_mark }}</td>  
                                        <td>{{ $class->pass_mark }}</td>                                      
                                        <td>{{ $class->get_mark }}</td>  
                                        
                                        
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