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
                            <h3>
                                
                                @if (@$AssingStudent)
                                Update Student Registration
                                @else
                                Student Registration
                                @endif
                            <a href="{{ route('setup.student.registation.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-list"></i> Show Registration
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body bordered shadow p-4">
                        <div class="row">
                            <div class="col">
                                <form action="{{ (@$AssingStudent)?route('setup.student.registation.update',$AssingStudent->student_id):route('setup.student.registation.store') }}" method="post" id="FormData" enctype="multipart/form-data">
                                    @csrf                                   
                                    <div class="row">
                                      <input type="hidden" name="id" value="{{ @$AssingStudent->id }}">
                                        <div class="col-4">
                                           <div class="mb-3">
                                              <label for="exampleFormControlInput1" class="form-label">Student Name <span class="text-danger">*</span></label>
                                              <input type="text" name="student_name" value="{{ @$AssingStudent->user->name }}"  id="class" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                              <div style="color: red">{{ ($errors->has('student_name'))?($errors->first('student_name')):" " }}</div>
                                           </div>
                                          </div>
                                          <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Father name<span class="text-danger">*</span></label>
                                                <input type="text" name="father_name" value="{{ @$AssingStudent->user->fat_name }}" id="class" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                                <div style="color: red">{{ ($errors->has('father_name'))?($errors->first('father_name')):" " }}</div>
                                             </div>
                                           </div>
                                           <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Mother Name<span class="text-danger">*</span></label>
                                                <input type="text" name="mother_name" value="{{ @$AssingStudent->user->mot_name }}" id="class" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                                <div style="color: red">{{ ($errors->has('mother_name'))?($errors->first('mother_name')):" " }}</div>
                                             </div>
                                           </div>
                                          
                                      </div>

                                    

                                    <div class="row">
                                        <div class="col-4">
                                           <div class="mb-3">
                                              <label for="exampleFormControlInput1" class="form-label">Mobile number <span class="text-danger">*</span></label>
                                              <input type="text" name="mobile_number" value="{{ @$AssingStudent->user->mobile }}"  id="class" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                              <div style="color: red">{{ ($errors->has('mobile_number'))?($errors->first('mobile_number')):" " }}</div>
                                           </div>
                                          </div>
                                          <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Address<span class="text-danger">*</span></label>
                                                <input type="text" name="address" value="{{ @$AssingStudent->user->address }}"  id="address" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                                <div style="color: red">{{ ($errors->has('address'))?($errors->first('address')):" " }}</div>
                                             </div>
                                           </div>
                                           <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Gender<span class="text-danger">*</span></label>
                                                <select name="gender" class="form-control form-control-sm" id="gender">
                                                    <option value="" selected disabled>Select gender</option>
                                                    <option value="male" {{ (@$AssingStudent->user->gender =='male')?"selected":'' }}>Male</option>
                                                    <option value="female" {{ (@$AssingStudent->user->gender =='female')?"selected":'' }}>Female</option>
                                                </select>
                                                <div style="color: red">{{ ($errors->has('gender'))?($errors->first('gender')):" " }}</div>
                                             </div>
                                           </div>
                                          
                                    </div>

                                      <div class="row">
                                         <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Religion<span class="text-danger">*</span></label>
                                                <select name="religion" class="form-control form-control-sm" id="religion">
                                                    <option value="" selected disabled>Select religion</option>
                                                    <option value="muslim" {{ (@$AssingStudent->user->religion =='muslim')?"selected":'' }}>Muslim</option>
                                                    <option value="hindu" {{ (@$AssingStudent->user->religion =='hindu')?"selected":'' }}>Hindu</option>
                                                    <option value="cristrian" {{ (@$AssingStudent->user->religion =='cristrian')?"selected":'' }}>Cristrian</option>
                                                </select>
                                                <div style="color: red">{{ ($errors->has('religion'))?($errors->first('religion')):" " }}</div>
                                             </div>
                                           </div>
                                           <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Date of birth<span class="text-danger">*</span></label>
                                                <input type="date" name="dateOfBirth" value="{{ @$AssingStudent->user->dob }}"  id="dateOfBirth" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                                <div style="color: red">{{ ($errors->has('dateOfBirth'))?($errors->first('dateOfBirth')):" " }}</div>
                                             </div>
                                           </div>
                                           
                                           <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Class <span class="text-danger">*</span></label>
                                                <select name="class" class="form-control form-control-sm" id="class">
                                                    <option value="" selected disabled>Select year</option>
                                                    @foreach ($studentClass as $class)
                                                     <option value="{{ $class->id }}" {{ (@$AssingStudent->class_id ==$class->id)?"selected":"" }}>{{ $class->name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                <div style="color: red">{{ ($errors->has('class'))?($errors->first('class')):" " }}</div>
                                             </div>
                                           </div>
                                          
                                      </div>
                                      <div class="row">                                          
                                        <div class="col-4">
                                           <div class="mb-3">
                                               <label for="exampleFormControlInput1" class="form-label">Year <span class="text-danger">*</span></label>
                                               <select name="year" class="form-control form-control-sm" id="year">
                                                   <option value="" selected disabled>Select year</option>
                                                   @foreach ($year as $years)
                                                    <option value="{{ $years->id }}" {{ (@$AssingStudent->year_id == $years->id)?"selected":'' }}>{{ $years->name }}</option>
                                                   @endforeach
                                               </select>
                                               <div style="color: red">{{ ($errors->has('year'))?($errors->first('year')):" " }}</div>
                                            </div>
                                          </div>
                                          <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Shift </label>
                                                <select name="shift" class="form-control form-control-sm" id="gender">
                                                    <option value="" selected disabled>Select shift</option>
                                                    @foreach ($shift as $shifts)
                                                     <option value="{{ $shifts->id }}" {{ (@$AssingStudent->shift_id ==$shifts->id)?"selected":"" }}>{{ $shifts->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div style="color: red">{{ ($errors->has('shift'))?($errors->first('shift')):" " }}</div>
                                             </div>
                                           </div>

                                           <div class="col-4">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Group </label>
                                                <select name="group" class="form-control form-control-sm" id="gender">
                                                    <option value="" selected disabled>Select group</option>
                                                    @foreach ($groups as $group)
                                                     <option value="{{ $group->id }}" {{ (@$AssingStudent->group_id == $group->id)?"selected":"" }}>{{ $group->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div style="color: red">{{ ($errors->has('group'))?($errors->first('group')):" " }}</div>
                                             </div>
                                           </div>
                                         
                                     </div>
                                     <div class="row">                                        
                                        <div class="col-4">
                                           <div class="mb-3">
                                              <label for="exampleFormControlInput1" class="form-label">Discount <span class="text-danger">*</span></label>
                                              <input type="text" name="discount" value="{{ @$AssingStudent->discount->discount }}"  id="class" class="form-control form-control-sm" id="exampleFormControlInput1" required>
                                              <div style="color: red">{{ ($errors->has('discount'))?($errors->first('discount')):" " }}</div>
                                           </div>
                                        </div>
                                        <div class="col-4">
                                          <div class="mb-3">
                                             <label for="exampleFormControlInput1" class="form-label">Image <span class="text-danger">*</span></label>
                                             <input id="image" type="file" value="" name="image" class="form-control form-control-sm" id="exampleFormControlInput1"> 
                                          </div>
                                       </div>
                                                                       
                                      
                                       <div class="col-4">
                                          <style>
                                              .image{
                                                  width: 400px;
                                                  height: 400px%;
                                                 
                                              }
                                              .image img{
                                                  width: 100%;
                                                  height: 100%;
                                                  border-radius: 50%;
                                                  object-fit: cover;
                                              }
                                          </style>
                                          <div class="mb-3 image">
                                             <label for="exampleFormControlInput1" class="form-label"></label>
                                             <img  id="showImage" class="profile-user-img img-fluid img-circle w-50"
                                                src="{{(@$AssingStudent->user->image)?url('upload/student_image/'.$AssingStudent->user->image):url('upload/empty-profile.png')}}" 
                                                alt="User profile picture">
                                          </div>
                                       </div>
                                                                                  
                                  </div>


                                      <div class="col-2">
                                        <div class="mb-3">
                                          @if (@$AssingStudent)
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
            
          student_name: {
            required: true,
            student_name: true,
          },
          father_name: {
            required: true,
            father_name: true,
          },
          mother_name: {
            required: true,
            mother_name: true,
          },
          address: {
            required: true,
            address: true,
          },
          religion: {
            required: true,
            religion: true,
          },
          dateOfBirth: {
            required: true,
            dateOfBirth: true,
          },
          class: {
            required: true,
            class: true,
          },
          year: {
            required: true,
            year: true,
          },
          gender: {
            required: true,
            gender: true,
          },
          fee_category_id: {
            required: true,
            fee_category_id: true,
          },
          // group: {
          //   required: true,
          //   group: true,
          // },
          
        },
        messages: {
            
        student_name: {
            required: "Please enter your name",
            student_name: "Please enter your name"
          },
          father_name: {
            required: "Please enter your father name",
            father_name: "Please enter father name"
          },
          mother_name: {
            required: "Please enter your mother name",
            mother_name: "Please enter your mother name"
          },
          mobile_number: {
            required: "Please enter your mobile number",
            mobile_number: "Please enter  your mobile number"
          },
          address: {
            required: "Please enter  your address",
            mobile_number: "Please enter your address"
          },
          religion: {
            required: "Please enter  your religion",
            mobile_number: "Please enter your religion"
          },
          dateOfBirth: {
            required: "Please enter  your date of birth",
            dateOfBirth: "Please enter your date of birth"
          },
          class: {
            required: "Please enter  your class name",
            class: "Please enter your class"
          },
          year: {
            required: "Please enter your address",
            year: "Please enter your address"
          },
          gender: {
            required: "Please enter  your gender",
            gender: "Please enter your gender"
          },
          fee_category_id: {
            required: "Please enter fee category name",
            fee_category_id: "Please enter fee category name"
          },
          // group: {
          //   required: "Please enter your group",
          //   group: "Please enter your group"
          // },
                   
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