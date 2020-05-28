@extends('layouts.app')

@section('content_header')
    <div class="col-sm-6">
        <h2 >Employees</h2>
    </div>

@endsection

@section('content')
    <div class="card no-border-radius no-box-shadow px-0 col-md-6">
        <div class="card-header border-0 pb-0 bg-inherit">
            <h3 class="card-title mb-0 fs-l">Employee edit</h3>
        </div>
        <div class="card-body" >
            {!! Form::model($employee,['route' => ['admin.employee.update', $employee->id], 'enctype'=>'multipart/form-data', 'method'=>'patch']) !!}
            @include('admin.employee._form')
            {!! Form::close() !!}
        </div>
        <!-- /.card-body -->
    </div>
@endsection




