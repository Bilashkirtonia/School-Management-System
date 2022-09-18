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
                            <h3> Edit fee_amount <a href="{{ route('setup.student.fee_amount.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-list"></i> Fee_amount</a></h3>
                        </div>
                    </div>
                    <div class="card-body bordered shadow p-4">
                      <form action="{{ route('setup.student.fee_amount.update',$fee_amount[0]->fee_type_id) }}" method="post" id="FormData">
                        @csrf
                        <div class="add-item">
                          <div class="row mb-5" >
                            <div class="form-group col-md-5">
                              <label for="">Fee category</label>
                              <select name="fee_category_id" id="" class="form-control">
                                <option value="" selected disabled>Select category name</option>
                                @foreach ($feetypes as $feetype)
                                <option value="{{ $feetype->id }}" {{ ($fee_amount['0']->fee_type_id == $feetype->id )?"selected":''}}>{{ $feetype->name }}</option>
                                @endforeach
                                
                              </select>
                            </div>
                          </div>


                         @foreach ($fee_amount as $edit_fee)
                         <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                          <div class="row ">
                            <div class="form-group col-md-5">
                              <label for="">Class name</label>
                              <select name="class_id[]" id="" class="form-control">
                                <option value="" selected disabled>Select class name</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ ($edit_fee->class_id == $class->id )?"selected":''}} >{{ $class->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          
                            <div class="form-group col-md-5">
                              <label for="">Fee amount</label>
                              <input type="text" value="{{ $edit_fee->amount }}" name="amount[]" class="form-control">
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
                                <div class="form-group col-md-5">
                                  <label for="">Class name</label>
                                  <select name="class_id[]" id="" class="form-control">
                                    <option value="" selected disabled>Select class name</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              
                                <div class="form-group col-md-5">
                                  <label for="">Fee amount</label>
                                  <input type="text" name="amount[]" class="form-control">
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
          "amount[]": {
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