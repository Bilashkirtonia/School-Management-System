@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee attendence</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                              @if (isset($EmployeeAttendEdit))
                              Update Employee attendence
                              @else
                              Employee attendence
                              @endif
                            
                            <a href="{{ route('setup.employee.attend.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-list"></i> Show Employee attendence list
                            </a></h3>
                        </div>
                    </div>
                    @if (isset($EmployeeAttendEdit))
                    <div class="card-body bordered shadow p-4">
                      <div class="row">
                          <div class="col">
                              <form action="{{ route('setup.employee.attend.upload',)}}" method="post" id="FormData" enctype="multipart/form-data">
                                  @csrf                                   
                                 <div class="row">
                                  <div class="col-md-6">
                                    <input type="date" value="{{ $EmployeeAttendEdit[0]->date }}" readonly name="date" id="date" class="form-control checkdate" placeholder="Enter the date...">
                                  </div>
                                 </div>

                                 
                                    <table class="table-sm table-bordered mt-5" style="width: 100%">
                                      
                                        <thead>
                                          <tr>
                                            <th class="text-center" rowspan="2">Sl</th>
                                            <th class="text-center" rowspan="2">Name</th>
                                            <th class="text-center" colspan="3" style="width: 30%">Present sataus</th>
                                          </tr>
                                          <tr>
                                            <th class="text-center btn btn-primary  persent_all" style="display: table-cell" >Present</th>
                                            <th class="text-center btn btn-info adsend_all" style="display: table-cell">Adsent</th>
                                            <th class="text-center btn btn-success leave_all" style="display: table-cell">Leave</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($EmployeeAttendEdit as $key => $user)
                                          <tr id="div{{ $user->id }}" class="text-center">
                                            <input type="hidden" name="employee_id[]" value="{{ $user->id }}" class="employee_id">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->user1->name }}</td>
                                            <style>
                                              .switch-toggle{
                                                width:auto;
                                              }
                                            </style>
                                            <td colspan="3" style="display: table-cell">
                                              <div class="switch-toggle switch-candy switch-body text-center">
                                                <input type="radio" class="present btn" id="present{{ $key }}" name="attend_sataus{{$key}}" value="Present" {{ ($user->attend_status == 'Present')?'checked':''}} >
                                                <label class="text-center" for="present{{ $key }}">Present</label>

                                                <input type="radio" class="absent" id="absent{{ $key }}" name="attend_sataus{{$key}}" value="Absent" {{ ($user->attend_status =='Absent')?'checked':''}} >
                                                <label for="absent{{ $key }}">Absent</label>

                                                <input type="radio" class="leave" id="leave{{ $key }}" name="attend_sataus{{$key}}" value="Leave" {{ ($user->attend_status =='Leave')?'checked':''}}>
                                                <label for="present{{ $key }}">Leave</label>

                                              </div>
                                            </td>
                                          </tr>
                                          @endforeach 
                                            
                                          
                                        </tbody>
                                    </table>
                                    <input class="btn btn-success mt-2" type="submit" value="Update" name="submit">
                              </form>
                          </div>
                      </div>
                    </div>
                    @else
                    <div class="card-body bordered shadow p-4">
                      <div class="row">
                          <div class="col">
                              <form action="{{ route('setup.employee.attend.store')}}" method="post" id="FormData" enctype="multipart/form-data">
                                  @csrf                                   
                                 <div class="row">
                                  <div class="col-md-6">
                                    <input type="date" name="date" id="date" class="form-control checkdate" placeholder="Enter the date...">
                                  </div>
                                 </div>

                                 
                                    <table class="table-sm table-bordered mt-5" style="width: 100%">
                                      
                                        <thead>
                                          <tr>
                                            <th class="text-center" rowspan="2">Sl</th>
                                            <th class="text-center" rowspan="2">Name</th>
                                            <th class="text-center" colspan="3" style="width: 30%">Present sataus</th>
                                          </tr>
                                          <tr>
                                            <th class="text-center btn btn-primary  persent_all" style="display: table-cell" >Present</th>
                                            <th class="text-center btn btn-info adsend_all" style="display: table-cell">Adsent</th>
                                            <th class="text-center btn btn-success leave_all" style="display: table-cell">Leave</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($users as $key => $user)
                                          <tr id="div{{ $user->id }}" class="text-center">
                                            <input type="hidden" name="employee_id[]" value="{{ $user->id }}" class="employee_id">
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <style>
                                              .switch-toggle{
                                                width:auto;
                                              }
                                            </style>
                                            <td colspan="3" style="display: table-cell">
                                              <div class="switch-toggle switch-candy switch-body text-center">
                                                <input type="radio" class="present btn" id="present{{ $key }}" name="attend_sataus{{$key}}" value="Present" checked="checked">
                                                <label class="text-center" for="present{{ $key }}">Present</label>

                                                <input type="radio" class="absent" id="absent{{ $key }}" name="attend_sataus{{$key}}" value="Absent" >
                                                <label for="absent{{ $key }}">Absent</label>

                                                <input type="radio" class="leave" id="leave{{ $key }}" name="attend_sataus{{$key}}" value="Leave" >
                                                <label for="present{{ $key }}">Leave</label>

                                              </div>
                                            </td>
                                          </tr>
                                          @endforeach 
                                            
                                          
                                        </tbody>
                                    </table>
                                    <input class="btn btn-success mt-2" type="submit" value="Send" name="submit">
                              </form>
                          </div>
                      </div>
                    </div>
                    @endif
                </div>
            </div>
                
                
        </div>
    </div>
</main>
<script>
  $(document).on('click','.persent_all',function(){
    $('input[value=Present]').prop('checked',true);
  });
  $(document).on('click','.adsend_all',function(){
    $('input[value=Absent]').prop('checked',true);
  });
  $(document).on('click','.leave_all',function(){
    $('input[value=Leave]').prop('checked',true);
  });
</script>
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