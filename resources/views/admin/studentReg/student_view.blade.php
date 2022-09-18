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
                            <h3>Student Registation <a href="{{ route('setup.student.registation.add') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-plus-circle"></i> Student Registation   
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body">
                     <form action="{{ route('setup.student.registation.search') }}" method="get" id="FormData">
                        <div class="row">
                            <div class="col-4">
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Year </label>
                                 <select name="year" class="form-control form-control-sm" id="year">
                                     <option value="" selected disabled>Select year</option>
                                     @foreach ($year as $years)
                                      <option value="{{ $years->id }}" {{ (@$year_id==$years->id)?"selected":""}}>{{ $years->name }}</option>
                                     @endforeach
                                 </select>
                                 <div style="color: red">{{ ($errors->has('year'))?($errors->first('year')):" " }}</div>
                              </div>
                            </div> 
                            
                            <div class="col-4">
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Class</label>
                                 <select name="class" class="form-control form-control-sm" id="class">
                                     <option value="" selected disabled>Select year</option>
                                     @foreach ($studentClass as $class)
                                      <option value="{{ $class->id }}" {{ (@$class_id==$class->id)?"selected":"" }}>{{ $class->name }}</option>
                                     @endforeach
                                     
                                 </select>
                                 <div style="color: red">{{ ($errors->has('class'))?($errors->first('class')):" " }}</div>
                              </div>
                            </div>
                            <div class="form-group col-md-4" style="margin-top: 33px">
                                <button type="submit" name="search" class="btn btn-success btn-sm">Search</button>
                            </div>
     
     
                           </div>
                     </form>
                    </div>
                    @if (!@$search)
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="2%">Id</th>
                                    <th>Name</th>
                                    <th>ID no.</th>
                                    <th>Roll</th>
                                    <th>Class</th>
                                    <th>Year</th>
                                    @if (Auth::user()->role == 'admin')
                                    <th>Code</th>
                                    @endif
                                    <th>Image</th>
                                    <th width="12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($AssingStudent as $key => $class)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $class->user->name }}</td> 
                                        <td>{{ $class->year_id }}</td>  
                                         
                                        <td>{{ $class->roll }}</td>  
                                        <td>{{ $class->student_class->name }}</td>  
                                        <td>{{ $class->year->name }}</td> 
                                        @if (Auth::user()->role == 'admin')
                                        <td>{{ $class->user->code }}</td>
                                        @endif
                                        <td><img width="80px" height="50px" src="{{ (!empty($class->user->image)?url("upload/student_image/".$class->user->image):url("../upload/empty-profile.png"))}}" alt=""></td>                                    
                                        <td>
                                            <a href="{{ route('setup.student.registation.edit',$class->student_id) }}"  class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('setup.student.registation.promotion',$class->student_id) }}"  class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                            <a target="_blank" href="{{ route('setup.student.registation.pdf.view',$class->student_id) }}"  class="btn btn-danger btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="2%">Id</th>
                                    <th>Name</th>
                                    <th>ID no.</th>
                                    <th>Roll</th>
                                    <th>Class</th>
                                    <th>Year</th>
                                    @if (Auth::user()->role == 'admin')
                                    <th>Code</th>
                                    @endif
                                    <th>Image</th>
                                    <th width="12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($AssingStudent as $key => $class)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $class->user->name }}</td> 
                                        <td>{{ $class->year_id }}</td>  
                                        <td>{{ $class->user->name }}</td>  
                                        <td>{{ $class->roll }}</td>  
                                        <td>{{ $class->student_class->name }}</td>  
                                        <td>{{ $class->year->name }}</td> 
                                        @if (Auth::user()->role == 'admin')
                                        <td>{{ $class->user->code }}</td>
                                        @endif
                                        <td><img width="80px" height="50px" src="{{ (!empty($class->user->image)?url("upload/student_image/".$class->user->image):url("../upload/empty-profile.png"))}}" alt=""></td>                                    
                                        <td>
                                            <a href="{{ route('setup.student.registation.edit',$class->student_id) }}"  class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('setup.student.registation.promotion',$class->student_id) }}"  class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                            <a target="_blank" href="{{ route('setup.student.registation.pdf.view',$class->student_id) }}"  class="btn btn-danger btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    
                </div>
            </div>
                
                
        </div>
    </div>
</main>
<script>
    $(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          alert( "Form successful submitted!" );
        }
      });
      $('#FormData').validate({
        rules: {
            
         class: {
            required: true,
            class: true,
          },
          year: {
            required: true,
            year: true,
          },
        messages: {
            
          class: {
            required: "Please enter  your class name",
            class: "Please enter your class"
          },
          year: {
            required: "Please enter your address",
            year: "Please enter your address"
          },
                   
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>
@endsection