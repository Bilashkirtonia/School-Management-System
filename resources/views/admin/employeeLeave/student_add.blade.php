@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee leave form</h1>
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
                                Update Employee leave
                                @else
                                Employee leave
                                @endif
                            <a href="{{ route('setup.employee.leave.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-list"></i> Show Employee leave list
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body bordered shadow p-4">
                        <div class="row">
                            <div class="col">
                                <form action="{{ (@$employee)?route('setup.employee.leave.upload',$employee->id):route('setup.employee.leave.store')}}" method="post" id="FormData" enctype="multipart/form-data">
                                    @csrf                                   
                                    <div class="row">
                                        <div class="col-4">
                                           <div class="mb-3">
                                              <label for="exampleFormControlInput1" class="form-label">Employee name<span class="text-danger">*</span></label>
                                                <select name="employee_id" class="form-control form-control-sm" id="name">
                                                  <option  selected disabled>Select name</option>
                                                    @foreach($AssingStudent as $key=> $user)
                                                      <option  value="{{ $user->id}}" {{ (@$employee->employee_id == $user->id)? "selected":""}} >{{$user->name }}</option>
                                                   @endforeach
                                                </select>
                                              <div style="color: red">{{ ($errors->has('name'))?($errors->first('name')):" " }}</div>
                                           </div>
                                          </div>
                                          <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Start Date<span class="text-danger">*</span></label>
                                                <input type="date" name="start_date" value="{{ @$employee->start_date }}"   id="start_date" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                                <div style="color: red">{{ ($errors->has('start_date'))?($errors->first('start_date')):" " }}</div>
                                             </div>
                                           </div>

                                           <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Start Date<span class="text-danger">*</span></label>
                                                <input type="date" name="end_date" value="{{ @$employee->end_date }}"    id="effected_date" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                                <div style="color: red">{{ ($errors->has('end_date'))?($errors->first('end_date')):" " }}</div>
                                             </div>
                                           </div>
                                           
                                      </div>

                                      <div class="row">
                                        <div class="col-4">
                                          <div class="mb-3">
                                              <label for="exampleFormControlInput1" class="form-label">Employee name<span class="text-danger">*</span></label>
                                                <select name="leave_purpose_id" class="form-control form-control-sm" id="leave_purpose_id">
                                                  <option value="" selected disabled>Select leave purpose</option>
                                                    @foreach($LeavePurpose as $key=> $user)
                                                      <option value="{{$user->id}}" {{ (@$employee->id == $user->id )?"selected":""}} >{{$user->name }}</option>
                                                   @endforeach
                                                   <option value="0">New purpose</option>
                                                   
                                                </select>

                                                <input type="text" name="name"  id="leave_form" class="form-control form-control-sm mt-1" style="display:none" placeholder="Enter new purpose">
                                              <div style="color: red">{{ ($errors->has('name'))?($errors->first('name')):" " }}</div>
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
  $(document).ready(function(){
    $(document).on('change','#leave_purpose_id',function(){
      var leave_purpose_id = $(this).val();
      if(leave_purpose_id == '0'){
        $('#leave_form').show();
      }else{
        $('#leave_form').hide();
      }
      
    });
  });

</script>
{{-- <script>
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
</script> --}}
@endsection