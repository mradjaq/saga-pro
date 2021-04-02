@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pb-2">
                <a href="{{ route('user') }}" class="btn btn-danger">Back</a>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Level</label>
                    <input type="text" class="form-control" value="{{ $user->level }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
