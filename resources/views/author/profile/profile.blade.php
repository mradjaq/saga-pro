@extends('layouts.app2')

@section('content')
    <div class="container">
        @include('layouts._partials.alerts')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                </div>
            </div>
        </div>
    </div>
@endsection
