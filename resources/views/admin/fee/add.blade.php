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
                              @if (isset($user))
                                Edit Fee
                              @else
                                Add Fee
                              @endif
                              
                              
                              
                              <a href="{{ route('setup.student.fee.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-list"></i> Year Fee
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body bordered shadow p-4">
                        <div class="row">
                            <div class="col">
                                <form action="{{ (@$user)?route('setup.student.fee.update',$user->id):route('setup.student.fee.store') }}" method="post" id="FormData">
                                    @csrf
                                    {{-- {{ csrf_field() }} --}}
                                   
                                    <div class="row">
                                        <div class="col-6">
                                           <div class="mb-3">
                                              <label for="exampleFormControlInput1" class="form-label">Add fee</label>
                                              <input type="text" name="fee" value="{{ @$user->name }}"  id="class" class="form-control" id="exampleFormControlInput1" required>
                                              <div style="color: red">{{ ($errors->has('fee'))?($errors->first('fee')):" " }}</div>
                                           </div>
                                          </div>
                                          
                                      </div>

                                      <div class="col-2">
                                        <div class="mb-3">
                                          @if (isset($user))
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
            
          fee: {
            required: true,
            fee: true,
          },
          
        },
        messages: {
            
          class: {
            required: "Please enter a group name",
            class: "Please enter a group name"
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