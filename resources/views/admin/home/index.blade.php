@extends('layouts.app')

@section('content_header')
    <div class="col-sm-6">
        <h1>Fixed Layout</h1>
    </div>
    <div class="col-sm-6 text-right">
        <a href="#" class="btn btn-dark no-border-radius">Add employer</a>
    </div>
@endsection

@section('content')
    <div class="card no-border-radius no-box-shadow">
        <div class="card-header with-border">
            <h3 class="card-title">Visitors Report</h3>

            <div class="card-tools pull-right">

            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body no-padding" >
            <?php
            $nodes = \App\Employee::get()->toTree();

            $traverse = function ($items) use (&$traverse) {
                echo "<ul>";
                foreach ($items as $item) {
                    echo "<li>".$item->full_name."</li>";

                    $traverse($item->children);
                }
                echo "</ul>";
            };

            $traverse($nodes);
            ?>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
