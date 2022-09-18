@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Static Navigation</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            
        </ol> 
        <div class="container">
            
            <form class="m-auto card shadow p-3" action="" method="POST" enctype="multipart/form-data">
                @csrf

               <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control mb-5" name="title" id="title" type="text" placeholder="Enter your title">
                    </div>
                    <div class="form-group">
                        <label for="sub_title">Sub_title</label>
                        <input class="form-control mb-5" name="sub_title" id="sub_title" type="text" placeholder="Enter your sub_title">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input class="form-control mb-5" name="image" id="image" type="file" placeholder="Enter your image">
                    </div>

                    <div class="form-group">
                        <label for="resume">Resume</label>
                        <input class="form-control mb-5" name="resume" id="resume" type="file" placeholder="Enter your resume">
                    </div>
                    
                </div>
               </div>
                <input class="btn btn-success mt-5" type="submit" name="submit" value="Submit">
            </div>
            </form> 
                    

                </div>
            </div>
        </main>
        @endsection




        {{-- <form action="{{ route("admin.main.header") }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
            <div class="col-6">
                <img style="height: 40vh; width:100%; object-fit:cover;" src="{{ url($main->bg_image)}}" alt="" class="img-thumbnail">
                <div class="form-group mt-3">
                    <label for="title">Background Image </label>
                    <input class="form-control mt-2" id="title" type="file" name="image">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control mb-5" name="title" id="title" value="{{ $main->title}}" type="text" value="Readonly input here...">
                </div>
                <div class="form-group">
                    <label for="title">Sub_title</label>
                    <input class="form-control mb-5" name="sub_title" id="sub_title" value="{{ $main->sub_title}}" type="text" value="Readonly input here...">
                </div>
                <div class="form-group">
                    <label for="title">Resume</label>
                    <input class="form-control mb-5" name="resume" id="resume" type="file" value="Readonly input here...">
                </div>
                
            </div>
            <input class="btn btn-success mt-5" type="submit" name="submit" value="Submit">
        </div>
        </form>  --}}