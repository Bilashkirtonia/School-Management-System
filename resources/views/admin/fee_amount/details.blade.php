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
                            <h3>View amount <a href="{{ route('setup.student.fee_amount.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-plus-circle"></i> Amount list   
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4><strong>Fee category : {{ $fee_amount['0']->fee_type->name }}</strong></h4>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Class</th>
                                 
                                    <th style="width: 200px">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fee_amount as $key => $class)
                                    <tr>
                                        <td>{{ $key+1 }}</td>                                       
                                        <td>{{ $class->student_class->name }}</td> 
                                        <td>{{ $class->amount }}</td>                                      
                                        
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