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
                            <h3>Year list <a href="{{ route('setup.student.year.add') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-plus-circle"></i> Add Year   
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Classes as $key => $class)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $class->name }}</td>                                       
                                        <td>
                                            <a href="{{ route('setup.student.year.edit',$class->id) }}"  class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('setup.student.year.delete',$class->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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