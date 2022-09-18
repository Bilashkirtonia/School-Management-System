@extends('admin.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Employee salary increment</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        </ol> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                               Increment salary details
                            <a href="{{ route('setup.employee.salary.view') }}" class="btn btn-success btn-sm float-end">
                                <i class="fa fa-list"></i> Show Employee list
                            </a></h3>
                        </div>
                    </div>
                    <div class="card-body bordered shadow p-4">
                        <div class="row">
                            <div class="col">
                            <div class="row">
                                <div class="col-5 pb-3">
                                    <h5>Employee name : {{ $user->name }}</h5>
                                </div>
                                <div class="col-3 pb-3">
                                    <h5>Employee Id : {{ $user->id_no }}</h5>
                                </div>
                               
                            </div>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th>Previous salary</th>
                                            <th>Increment salary</th>
                                            <th>Present salary</th>
                                            <th>Effected Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $details as $key => $details )
                                        @if ($key == '0')
                                            <h5> Joining salary : {{ $details->previes_salary }}</h5>
                                        @else
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $details->previes_salary }}</td>
                                            <td>{{ $details->increment_salary}}</td>
                                            <td>{{ $details->present_salary }}</td>
                                            <td>{{ $details->effect_date }}</td>
                                        </tr>
                                        @endif
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
                
        </div>
    </div>
</main>

@endsection