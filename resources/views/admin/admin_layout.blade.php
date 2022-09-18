<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        

        <style>
            .notifyjs-corner{
                z-index: 10000 !important;
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                </ul>
              </div>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 float-end">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       {{ Auth::User()->name }}</i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>
                        
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    
                    </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <a class="nav-link collapsed" href="{{ route('dashboard') }}"  data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Main
                            </a>

                            @if (Auth::User()->usertype == 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    Manage user
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li>
                                     <a class="dropdown-item" href="{{ route('user.view') }}"> <i class="far fa-circle nav-icon"></i> View user</a>
                                  </li>
                                  <li><a class="dropdown-item" href="{{ route('user.add') }}"><i class="far fa-circle nav-icon"></i> Add user</a></li>
                                </ul>
                            </li>  
                            @endif
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                    Manage profile
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li>
                                    
                                     <a class="dropdown-item" href="{{ route('profile.view') }}"> <i class="far fa-circle nav-icon"></i> Your profile</a>
                                    </li>
                                  <li><a class="dropdown-item" href="{{ route('profile.password_view') }}"><i class="far fa-circle nav-icon"></i> Change password</a></li>
                                </ul>
                            </li> 

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                    Manage setup
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li>
                                     <a class="dropdown-item" href="{{ route('setup.student.class.view') }}"> <i class="far fa-circle nav-icon"></i> Student class</a>
                                  </li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.year.view') }}"><i class="far fa-circle nav-icon"></i> View years</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.group.view') }}"><i class="far fa-circle nav-icon"></i> View Groups</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.shift.view') }}"><i class="far fa-circle nav-icon"></i> View Shift</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.fee.view') }}"><i class="far fa-circle nav-icon"></i> View fee category</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.fee_amount.view') }}"><i class="far fa-circle nav-icon"></i> Fee category amount</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.exam.view') }}"><i class="far fa-circle nav-icon"></i> Exam list</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.subject.view') }}"><i class="far fa-circle nav-icon"></i> Subject list</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.aasign.view') }}"><i class="far fa-circle nav-icon"></i> Assing subject</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.designation.view') }}"><i class="far fa-circle nav-icon"></i> Designation</a></li>
                            </ul>
                            </li> 

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                    Manage students
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                     <a class="dropdown-item" href="{{ route('setup.student.registation.view') }}"> <i class="far fa-circle nav-icon"></i> Student Registration</a>
                                    </li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.roll.generate.view') }}"><i class="far fa-circle nav-icon"></i> Roll Generate</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.reg.amount.view') }}"><i class="far fa-circle nav-icon"></i> Student Registration fee</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.reg.monthlyFee.view') }}"><i class="far fa-circle nav-icon"></i> Student Monthly fee</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.student.reg.examFee.view') }}"><i class="far fa-circle nav-icon"></i> Student Exam fee</a></li>

                                </ul>
                            </li> 

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                    Manage employee
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                     <a class="dropdown-item" href="{{ route('setup.employee.registation.view') }}"> <i class="far fa-circle nav-icon"></i> Employee Registration</a>
                                    </li>
                                  <li><a class="dropdown-item" href="{{ route('setup.employee.salary.view') }}"><i class="far fa-circle nav-icon"></i> Employee salary increment</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.employee.leave.view') }}"><i class="far fa-circle nav-icon"></i> Employee leave</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.employee.attend.view') }}"><i class="far fa-circle nav-icon"></i> Employee attend</a></li>
                                  <li><a class="dropdown-item" href="{{ route('setup.employee.monthly.salary.view') }}"><i class="far fa-circle nav-icon"></i> Employee monthly salary</a></li>

                                </ul>
                            </li> 

                             <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                    Manage marks
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                     <a class="dropdown-item" href="{{ route('student.marks.add') }}"> <i class="far fa-circle nav-icon"></i> Student marks entry</a>
                                    </li>
                                  <li><a class="dropdown-item" href="{{ route('student.marks.edit') }}"><i class="far fa-circle nav-icon"></i> Student marks edit</a></li>
                                  <li><a class="dropdown-item" href="{{ route('student.grade.view') }}"><i class="far fa-circle nav-icon"></i> Grade point</a></li>
                                  <li><a class="dropdown-item" href="{{ route('student.marksheet.view') }}"><i class="far fa-circle nav-icon"></i> Marks sheet</a></li>
                                </ul>
                            </li> 
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                    Account management
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                     <a class="dropdown-item" href="{{ route('student.fee.view') }}"> <i class="far fa-circle nav-icon"></i> Student Fees</a>
                                    </li>
                                  
                                </ul>
                            </li> 
                       
                        </div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">


                {{-- @include('alert.messages') --}}
                @yield('content')

            </div>
        </div>

        @if (session()->has('success'))
            <script>
                $(function(){
                    $.notify("{{ (session()->get('success')) }}",{globalPosition:'top right',className:'success'});
                });
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                $(function(){
                    $.notify("{{ (session()->get('error')) }}",{globalPosition:'top right',className:'error'});
                });
            </script>
        @endif

        <script>

            $(function(){
                $(document).on('click','#delete',function(e){
                   
                    e.preventDefault();
                    var link = $(this).attr('href');

                    Swal.fire({
                title: 'Are you sure?',
                text: "Want to delete data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                });
        
                });
            });
   
        </script>

        <script>
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/additional-methods.min.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        

        <script>
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                
                }
                reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>

        
    </body>
</html>



