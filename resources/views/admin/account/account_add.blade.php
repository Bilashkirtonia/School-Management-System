@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Student Fee</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Student fee <a href="{{ route('student.fee.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-plus-circle"></i> Student fee list   
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body">
                     <form action="{{ route('student.marks.store') }}" method="POST" id="FormData">
                      @csrf
                        <div class="row">
                            <div class="col-3">
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Year </label>
                                 <select name="year" class="form-control form-control-sm" id="year">
                                     <option value="" selected disabled>Select year</option>
                                     @foreach ($year as $years)
                                      <option value="{{ $years->id }}">{{ $years->name }}</option>
                                     @endforeach
                                 </select>
                                 <div style="color: red">{{ ($errors->has('year'))?($errors->first('year')):" " }}</div>
                              </div>
                            </div> 
                            {{-- <input type="checkbox"> --}}
                            
                            <div class="col-3">
                             <div class="mb-3">
                                 <label for="exampleFormControlInput1" class="form-label">Class</label>
                                 <select name="class" class="form-control form-control-sm" id="class">
                                     <option value="" selected disabled>Select class</option>
                                     @foreach ($studentClass as $class)
                                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                                     @endforeach
                                 </select>
                                 <div style="color: red">{{ ($errors->has('class'))?($errors->first('class')):" " }}</div>
                              </div>
                            </div>

                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fee category </label>
                                    <select name="fee_type_id" class="form-control form-control-sm" id="fee_type_id">
                                        <option value="" selected disabled>Select Fee</option>
                                        @foreach ($feeTypes as $feeType)
                                         <option value="{{ $feeType->id }}">{{ $feeType->name }}</option>
                                        @endforeach
                                    </select>
                                    <div style="color: red">{{ ($errors->has('year'))?($errors->first('year')):" " }}</div>
                                 </div>
                               </div> 

                               <div class="col-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Year </label>
                                    <input type="date" name="date" class="form-control form-control-sm" id="date">
                                    <div style="color: red">{{ ($errors->has('year'))?($errors->first('year')):" " }}</div>
                                 </div>
                               </div> 

                           

                            <div class="form-group col-md-4" style="margin-top: 33px">
                                <a id="search" name="search" class="btn btn-success btn-sm">Search</a>
                            </div>
     
     
                        </div>
                        {{-- <br>
                        <div class="row d-none" id="roll_generate">
                          <div class="col-md-12">
                            <table class="table table-bordered table-striped dt-responsive">
                              <thead>
                                <tr>
                                  <th>ID No.</th>
                                  <th>Student name</th>
                                  <th>Father's name</th>
                                  <th>Gender</th>
                                  <th>Marks</th>
                                </tr>
                              </thead>
                              <tbody id="roll_generate_tr">

                              </tbody>
                            </table>
                          </div>
                        
                        <button type="submit" class="btn btn-success btn-sm">Marks update</button> --}}
                      </div>
                     </form>
                    </div>

                    <div class="card-body">
                        <div id="DocumentResult"></div>
                        <script id="document-template" type="text/handlebars-template">
                           <form method="post" action="{{ route('student.fee.store') }}">
                            @csrf
                            <table class="table table-bordered table-striped" style="width: 100%">
                                <thead>
                                    <tr>
                                        @{{{thsource}}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @{{#each this}}
                                    <tr>
                                        @{{{tdsource}}}
                                    </tr>
                                    @{{/each}}
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-success btn-sm">Send</button>            
                           </form>
                        </script>
                    </div>
                </div>
            </div>
                
                
        </div>
    </div>
</main>

{{-- <script>
$(function(){
  $(document).on('change','#class',function(){
    var class_id = $('#class').val();
    $.ajax({
      url:"{{ route('student.get.subject') }}",
      type:"GET",
      data:{class:class_id},
      success:function(data){
        var html = '<option vlaue="">Select subject</option>';
        $.each(data,function(key,v){
          html+= '<option value="'+v.id+'">'+v.subject_name.name+'</option>'
        });
        $('#assing_subject_id').html(html);
      }
    });
  });
});
</script> --}}


<script>
  $(function(){
    $('#FormData').validate({
      rules: {
        "roll[]": {
          required: true,
          
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
        },
        }
    });
  });

</script>

<script>
  $(document).on('click','#search',function(){
    var year_id = $('#year').val();
    var class_id = $('#class').val();
    var fee_type_id = $('#fee_type_id').val();
    var date = $('#date').val();

    $('.notifyjs-corner').html('');

    // if(year_id ==''){
    //   $.notify("Year required",{globalPosition:'top right',className:'errors'});
    //   return false;
    // }

    // if(class_id == ''){
    //   $.notify("Class required",{globalPosition:'top right',className:'errors'});
    //   return false;
    // }
    // if(exam_type_id ==''){
    //   $.notify("Exam required",{globalPosition:'top right',className:'errors'});
    //   return false;
    // }

    // if(assing_subject_id == ''){
    //   $.notify("Subject required",{globalPosition:'top right',className:'errors'});
    //   return false;
    // }
    $.ajax({
      url:"{{ route('student.fee.get_student') }}",
      type:"GET",
      data:{'year_id':year_id ,'class_id':class_id,'fee_type_id':fee_type_id ,'date':date},
      success:function(data){
            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var html = template(data);
            $('#DocumentResult').html(html);
            $('[data-toggle = "tooltip"]').tooltip();

        }
      // success:function(data){
      //   // $('#roll_generate').removeClass('d-none');
      //   // var html = "";
      //   // $.each(data,function(key,v){
      //   //   html+=
      //   //   '<tr>'+
      //   //       '<td>'+ v.user.id_no +'<input type="hidden" name="student_id[]" value="'+v.student_id+'"><input type="hidden" name="id_no[]" value="'+v.user.id_no+'"></td>'+
      //   //       '<td>'+ v.user.name +'</td>'+
      //   //       '<td>'+ v.user.fat_name +'</td>'+
                            
      //   //       '<td>'+ v.user.gender +'</td>'+
      //   //       '<td><input type="text" name="marks[]" required></td>'+
      //   //   '</tr>';
        
            
      //   });
      //   html = $('#roll_generate_tr').html(html);
      // }
    });
  });
</script>

@endsection


  