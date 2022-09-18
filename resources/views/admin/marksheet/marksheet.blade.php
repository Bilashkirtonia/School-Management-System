@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Grade</h1>
       
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Student marksheet 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 m-auto">
                                <form action="{{ route('student.marksheet.add') }}" method="get" target="_blank">
                                    @csrf
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Group </label>
                                                <select name="year" class="form-control form-control-sm" id="year">
                                                    <option value="" selected disabled>Select year</option>
                                                    @foreach ($years as $year)
                                                     <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                              <div style="color: red">{{ ($errors->has('group'))?($errors->first('group')):" " }}</div>
                                            </div>
                                         </div>
                                         <div class="col-3">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Class </label>
                                                <select name="class" class="form-control form-control-sm" id="class">
                                                    <option value="" selected disabled>Select class</option>
                                                    @foreach ($classes as $class)
                                                     <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                              <div style="color: red">{{ ($errors->has('group'))?($errors->first('group')):" " }}</div>
                                            </div>
                                         </div> 
                                         <div class="col-3">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Exam </label>
                                                <select name="exam" class="form-control form-control-sm" id="exam">
                                                    <option value="" selected disabled>Select group</option>
                                                    @foreach ($exams as $exam)
                                                     <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                    @endforeach
                                                </select>
                                              <div style="color: red">{{ ($errors->has('group'))?($errors->first('group')):" " }}</div>
                                            </div>
                                         </div> 
                                         <div class="col-3">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Id no </label>
                                                <input type="text" name="id_no" class="form-control form-control-sm" id="id_no">
                                              <div style="color: red">{{ ($errors->has('group'))?($errors->first('group')):" " }}</div>
                                            </div>
                                         </div> 

                                    </div>

                                    <input type="submit" class="btn btn-success btn-sm mt-3" value="Search" name="submit">
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