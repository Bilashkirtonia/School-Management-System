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
                            <h3>Add Grade <a href="{{ route('student.grade.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-plus-circle"></i> Grade list   
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 m-auto">
                                <form action="{{ route('student.grade.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="">Grade name</label>
                                            <input type="text" name="grade_name" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Grade point</label>
                                            <input type="text" name="grade_point" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Start marks</label>
                                            <input type="text" name="start_marks" class="form-control form-control-sm">
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="form-group col-md-4">
                                            <label for="">End marks</label>
                                            <input type="text" name="end_marks" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Start points</label>
                                            <input type="text" name="start_point" class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">End points</label>
                                            <input type="text" name="end_point" class="form-control form-control-sm">
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="form-group col-md-4">
                                            <label for="">Remarks</label>
                                            <input type="text" name="remarks" class="form-control form-control-sm">
                                        </div>
                                        

                                    </div>
                                    <input type="submit" class="btn btn-success btn-sm mt-3" value="Send" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
                
                
        </div>
    </div>
</main>
@endsection