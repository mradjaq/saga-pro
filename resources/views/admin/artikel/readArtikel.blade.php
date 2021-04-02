@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pb-2">
                <a href="{{ route('artikel') }}" class="btn btn-danger">Back</a>
        </div>
        <div class="col-md-8">
                  <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" value="{{ $artikel->title }}" disabled>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" class="form-control" value="{{ $artikel->kategori }}" disabled>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Banner</label>
                    <br>
                    <img src="{{ asset('storage/' . $artikel->banner) }}" style="max-width: 300px" alt="banner">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea class="form-control" readonly>{{ $artikel->content }}</textarea>
                  </div>
        </div>
    </div>
</div>
@endsection
