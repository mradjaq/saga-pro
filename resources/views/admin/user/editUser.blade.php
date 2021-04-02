@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts._partials.alerts')
        <div class="row justify-content-center">
            <div class="col-md-8 pb-2">
                <a href="{{ route('user') }}" class="btn btn-danger">Back</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('putUser', $user->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Level</label>
                        <select class="form-select form-control" name="level_id" aria-label="Default select example">
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" @if ($level->id == $user->level_id) selected @endif>
                                    {{ $level->level }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
