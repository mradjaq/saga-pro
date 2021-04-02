@extends('layouts.app2')

@section('content')
<div class="container">
    @include('layouts._partials.alerts')
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{ route('putPassword', $user->id), }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                  <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" value="{{ $user->email }}" name="password_confirmation">
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
