@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts._partials.alerts')
    <div class="row justify-content-center">
        <div class="col-md-8 pb-2">
                <a href="{{ route('admin') }}" class="btn btn-danger">Back</a>
        </div>
        <div class="col-md-8">
            <form action="{{ route('postKategori') }}" method="POST">
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
