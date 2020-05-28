@extends('layouts.app')

@section('content_header')
    <div class="col-sm-6">
        <h2 >Employees</h2>
    </div>
    <div class="col-sm-6 text-right">
        <a href="{{route('admin.employee.create')}}" class="btn btn-dark no-border-radius">Add employee</a>
    </div>
@endsection

@section('content')
    <div class="card no-border-radius no-box-shadow">
        <div class="card-header border-0 pb-0 bg-inherit">
            <h3 class="card-title mb-0 fs-l">Employee list</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive" >
            {{$dataTable->table()}}
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush

