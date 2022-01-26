@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <div class="card-title">
                    <h3>View File</h3>
                </div>

                <div class="card-body">
                <div class="card-text">
                    <img width="200" height="200" src="{{ asset('storage/'. $files) }}"> 
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection