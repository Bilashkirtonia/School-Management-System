@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee Attendence</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Employee Attendence 
                            <a href="{{ route('setup.employee.attend.add') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-list"></i> Add Employee Attendence 
                            </a>
                            </h3>
                            
                        </div>
                    </div>
                    <div class="card-body">
                     
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="2%">Si</th>
                                    {{-- <th>Name</th>
                                    <th>Id No</th> --}}
                                    {{-- <th>Attend status</th> --}}
                                    <th>Date</th>
                                    <th width="12%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($EmployeeAttend as $key => $class)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        {{-- <td>{{ $class->user->name }}</td> 
                                        <td>{{ $class->user->id_no }}</td>  --}}
                                        <td>{{ $class->date }}</td>  
                                        {{-- <td>{{ $class->attend_status }}</td>   --}}
                                        <td>
                                        
                                            <a href="{{ route('setup.employee.attend.edit',$class->date )}}"  class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('setup.employee.attend.details',$class->date  )}}"  class="btn btn-danger btn-sm"><i class="fa fa-eye"></i></a> 
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
{{-- <script>
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
</script> --}}
@endsection