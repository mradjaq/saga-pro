@extends('layouts.app2')

@section('content')
    <div class="container">
        @include('layouts._partials.alerts')
        <div class="row justify-content-center">
            <div class="col-md-8 pb-2">
                <a href="{{ route('author') }}" class="btn btn-danger">Back</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('author-postKategori') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" class="form-control" name="kategori">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
