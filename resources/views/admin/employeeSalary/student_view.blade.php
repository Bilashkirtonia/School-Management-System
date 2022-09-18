@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Employee list</h3>
                        </div>
                    </div>
                    <div class="card-body">
                     
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="2%">Id</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Join date</th>
                                    <th>Salary</th>
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
                                        <td>{{ $class->name }}</td> 
                                        <td>{{ $class->mobile }}</td>  
                                        <td>{{ $class->address }}</td>  
                                        <td>{{ $class->gender }}</td>  
                                        <td>{{ $class->join_date }}</td>
                                        <td>{{ $class->salary }}</td> 
                                                                                
                                        @if (Auth::user()->role == 'admin')
                                        <td>{{ $class->code }}</td>
                                        @endif
                                        <td><img width="80px" height="50px" src="{{ (!empty($class->image)?url("upload/employee_image/",$class->image):url("../upload/empty-profile.png"))}}" alt=""></td>                                    
                                        <td>
                                        
                                           <a href="{{ route('setup.employee.salary.add',$class->id )}}"  class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                                            <a href="{{ route('setup.employee.salary.details',$class->id  )}}"  class="btn btn-danger btn-sm"><i class="fa fa-eye"></i></a> 
                                        </td>
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