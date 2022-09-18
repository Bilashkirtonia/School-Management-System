@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee salary increment</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                
                                @if (@$AssingStudent)
                                Update Employee Registration
                                @else
                                Employee salary increment
                                @endif
                            <a href="{{ route('setup.employee.salary.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-list"></i> Show Employee list
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body bordered shadow p-4">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('setup.employee.salary.store',$AssingStudent->id) }}" method="post" id="FormData" enctype="multipart/form-data">
                                    @csrf                                   
                                    <div class="row">
                                        <div class="col-4">
                                           <div class="mb-3">
                                              <label for="exampleFormControlInput1" class="form-label">Employee salary increment<span class="text-danger">*</span></label>
                                              <input type="text" name="increment_salary" value="{{ @$editEmployee->name }}"  id="class" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                              <div style="color: red">{{ ($errors->has('increment_salary'))?($errors->first('increment_salary')):" " }}</div>
                                           </div>
                                          </div>
                                          <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Effected Date<span class="text-danger">*</span></label>
                                                <input type="date" name="effected_date" value="{{ @$editEmployee->fat_name }}" id="effected_date" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                                <div style="color: red">{{ ($errors->has('effected_date'))?($errors->first('effected_date')):" " }}</div>
                                             </div>
                                           </div>
                                           
                                      </div>

                                      <div class="col-2">
                                        <div class="mb-3">
                                          @if (@$editEmployee)
                                          <input type="submit" class="btn btn-success" value="Update" > 
                                          @else
                                          <input type="submit" class="btn btn-success" value="Send" > 
                                          @endif
                                         
                                         </div>
                                      </div>

                                </form>
                            </div>
                        </div>
                    </div>
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
          increment_salary: {
            required: true,
            increment_salary: true,
          },
          effected_date: {
            required: true,
            effected_date: true,
          },
        },
        messages: {
            
          increment_salary: {
            required: "Please enter your name",
            increment_salary: "Please enter your name"
          },
          effected_date: {
            required: "Please enter your father name",
            effected_date: "Please enter father name"
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