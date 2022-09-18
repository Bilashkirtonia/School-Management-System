@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Exam fee</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Student Exam fee</h3>
                        </div>
                    </div>
                    <div class="card-body">
                     {{-- <form action="{{ route('setup.student.roll.generate.store') }}" method="POST" id="FormData">
                      @csrf --}}
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
                                  <label for="exampleFormControlInput1" class="form-label">Month</label>
                                  <select name="exam" class="form-control form-control-sm" id="exam">
                                      <option value="" selected disabled>Select Exam</option>
                                      @foreach ($exams as $exam)
                                      <option value="{{ $exam->name }}">{{ $exam->name }}</option>
                                     @endforeach
                                      
                                  </select>
                                  <div style="color: red">{{ ($errors->has('class'))?($errors->first('class')):" " }}</div>
                               </div>
                             </div>

                            <div class="form-group col-md-3" style="margin-top: 33px">
                                <a id="search" name="search" class="btn btn-success btn-sm">Search</a>
                            </div>
     
     
                        </div>
                        <br>
                       
                        <div class="card-body">
                            <div id="DocumentResult"></div>
                            <script id="document-template" type="text/handlebars-template">
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
                            </script>
                        </div>
                     {{-- </form> --}}
                    </div>

                    
                                        
                </div>
            </div>
                
                
        </div>
    </div>
</main>
{{-- <script>
  $(function(){
    $('#FormData').validate({
      rules: {
        "roll[]": {
          required: true,
          
        },
        // year: {
        //   required: true,
        //   year: true,
        // },
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

</script> --}}

<script>
  $(document).on('click','#search',function(){
    var year_id = $('#year').val();
    var class_id = $('#class').val();
    var exam = $('#exam').val();
    $('.notifyjs-corner').html('');

    if(year_id ==''){
      $.notify("Year required",{globalPosition:'top right',className:'error'});
      return false;
    }

    if(class_id == ''){
      $.notify("Class required",{globalPosition:'top right',className:'error'});
      return false;
    }
    if(exam == ''){
      $.notify("Class required",{globalPosition:'top right',className:'error'});
      return false;
    }

    $.ajax({
        url:"{{ route('setup.student.examFee.amount.getstudent') }}",
        type:"GET",
        data:{'year_id':year_id,'class_id':class_id,'exam':exam},
        beforeSend:function(){

        },
        success:function(data){
            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var html = template(data);
            $('#DocumentResult').html(html);
            $('[data-toggle = "tooltip"]').tooltip();

        }
    });
    
  });
</script>




@endsection


  