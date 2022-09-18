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
                            <h3>Fee amount <a href="{{ route('setup.student.fee_amount.add') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-plus-circle"></i> Add amount   
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th style="width: 200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Classes as $key => $class)
                                    <tr>
                                        <td>{{ $key+1 }}</td>                                       
                                        <td>{{ $class->fee_type->name }}</td>                                       
                                        <td>
                                            <a href="{{ route('setup.student.fee_amount.details',$class->fee_type_id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('setup.student.fee_amount.edit',$class->fee_type_id) }}"  class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            
                                        </td>
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