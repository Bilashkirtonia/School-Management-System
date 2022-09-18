@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee monthly salary</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Employee monthly salary</h3>
                        </div>
                    </div>
                    <div class="card-body">
                     {{-- <form action="{{ route('setup.student.roll.generate.store') }}" method="POST" id="FormData">
                      @csrf --}}
                        <div class="row">

                          <div class="col-4">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Class</label>
                                <input type="date" name="date" id="date" class="form-control">
                                <div style="color: red">{{ ($errors->has('class'))?($errors->first('class')):" " }}</div>
                             </div>
                           </div>
                                                        
                            
                            <div class="form-group col-md-4" style="margin-top: 33px">
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

<script>
  $(document).on('click','#search',function(){
    var date = $('#date').val();
    // var class_id = $('#class').val();
    $('.notifyjs-corner').html('');

    if(date ==''){
      $.notify("date required",{globalPosition:'top right',className:'errors'});
      return false;
    }

    $.ajax({
        url:"{{ route('setup.employee.monthly.salary.add') }}",
        type:"GET",
        data:{'date':date},
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


  