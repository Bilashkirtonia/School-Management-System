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
                            <h3> Edit subject <a href="{{ route('setup.student.aasign.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-list"></i> Edit assing subject</a></h3>
                        </div>
                    </div>
                    <div class="card-body bordered shadow p-4">
                      <form action="{{ route('setup.student.aasign.update',$editData[0]->class_id) }}" method="post" id="FormData">
                        @csrf
                        <div class="add-item">
                          <div class="row mb-5" >
                            <div class="form-group col-md-5">
                              <label for="">Fee category</label>
                              <select name="fee_category_id" id="" class="form-control">
                                <option value="" selected disabled>Select category name</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ ($editData['0']->class_id == $class->id )?"selected":''}}>{{ $class->name }}</option>
                                @endforeach
                                
                              </select>
                            </div>
                          </div>


                         @foreach ($editData as $edit_data)
                         <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                          <div class="row ">
                            
                              <div class="form-group col-md-3">
                                <label for="">Subject name</label>
                                <select name="subject_id[]" id="subject_id" class="form-control">
                                  <option value="" selected disabled>Select class name</option>
                                  @foreach ($subjects as $subject)
                                  <option value="{{ $subject->id }}" {{ ($edit_data->subject_id == $subject->id)?"selected":"" }}> {{ $subject->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            
                              <div class="form-group col-md-2">
                                <label for="">Full mark</label>
                                <input type="text" value="{{ $edit_data->full_mark}}" name="full_mark[]" class="form-control">
                              </div>
                              <div class="form-group col-md-2">
                                <label for="">Pass mark</label>
                                <input type="text" value="{{ $edit_data->pass_mark}}" name="pass_mark[]" class="form-control">
                              </div>
                              <div class="form-group col-md-2">
                                <label for="">Get mark</label>
                                <input type="text" value="{{ $edit_data->get_mark}}" name="get_mark[]" class="form-control">
                              </div>
  
                              
  
                           

                            <div class="form-group col-md-2 mt-4">
                              <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                              <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                            </div>

                          </div>
                        </div>
                          @endforeach 
                        </div>
                        <div class="col-2 mt-3">
                          <div class="mb-3">
                            <input type="submit" class="btn btn-success" value="Send" >
                           </div>
                        </div>
                        <div style="visibility: hidden">
                          <div class="whole_extra_item_add" id="whole_extra_item_add">
                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                              <div class="row ">
                                
                                  <div class="form-group col-md-3">
                                    <label for="">Subject name</label>
                                    <select name="subject_id[]" id="subject_id" class="form-control">
                                      <option value="" selected disabled>Select class name</option>
                                      @foreach ($subjects as $subject)
                                      <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                
                                  <div class="form-group col-md-2">
                                    <label for="">Full mark</label>
                                    <input type="text" name="full_mark[]" class="form-control">
                                  </div>
                                  <div class="form-group col-md-2">
                                    <label for="">Pass mark</label>
                                    <input type="text" name="pass_mark[]" class="form-control">
                                  </div>
                                  <div class="form-group col-md-2">
                                    <label for="">Get mark</label>
                                    <input type="text" name="get_mark[]" class="form-control">
                                  </div>
      
                                  
      
                                

                                
                        
                                <div class="form-group col-md-2 mt-4">
                                  <div class="form-row">
                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                  </div>
                                </div>
                        
                              </div>
                            </div>
                          </div>
                        </div>

                   </form>
                    </div>
                </div>
            </div>
                
                
        </div>
    </div>
</main>

<script>
  $(document).ready(function(){
    var conuter = 0;
    $(document).on("click",".addeventmore",function(){
      var whole_extra_item_add = $('#whole_extra_item_add').html();
        $(this).closest('.add-item').append(whole_extra_item_add);
        conuter++;
    });
    $(document).on("click",".removeeventmore",function(event){
      $(this).closest('.delete_whole_extra_item_add').remove();
      counter--;
    });
  });
</script>










<script>
    $(function () {
      $.validator.setDefaults({
        
      });
      $('#FormData').validate({
        rules: {
            
          "fee_category_id": {
            required: true,
            
          },
          "class_id[]": {
            required: true,
            
          },
          "full_mark[]": {
            required: true,
            
          },
          "pass_mark[]": {
            required: true,
            
          } 
          ,
          "get_mark[]": {
            required: true,
            
          }             
        },
        messages: {
            
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