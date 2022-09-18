@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Static Navigation</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            
        </ol> 
        <div class="container">
            
                <h2 class="text-center">Welcome to the dashboard</h2>
            

        </div>
    </div>
</main>
@endsection