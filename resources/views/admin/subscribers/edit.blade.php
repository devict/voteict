@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Subscriber</div>
                <div class="card-body">
                    @include('admin.subscribers.form', compact('subscriber'))
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
