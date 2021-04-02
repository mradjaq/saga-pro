@extends('layouts.app2')

@section('content')
<div class="container">
    @include('layouts._partials.alerts')
    <div class="row justify-content-center">
        <div class="col-md-8 pb-2">
                <a href="{{ route('author-artikel') }}" class="btn btn-danger">Back</a>
        </div>
        <div class="col-md-8">
        <form action="{{ route('author-putArtikel', $artikel->slug), }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                  <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" value="{{ $artikel->title }}" name="title">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select form-control" name="category_id" aria-label="Default select example">
                        @foreach ($kategoris as $kategori)
                            <option value="{{$kategori->id}}"
                            @if ($kategori->id == $artikel->category_id)
                                selected
                            @endif>{{ $kategori->kategori }}</option>  
                        @endforeach
                      </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Banner</label>
                    <br>
                    <img src="{{ asset('storage/' . $artikel->banner) }}" style="max-width: 300px" alt="banner">
                    <br>
                    <input type="file" name="banner" class="form-control" value="{{ $artikel->banner }}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="content" class="form-control">{{ $artikel->content }}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
