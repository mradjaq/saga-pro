@extends('layouts.app2')

@section('content')
    <div class="container">
        @include('layouts._partials.alerts')
        <div class="row justify-content-center">
            <div class="col-md-8 pb-2">
                <a href="{{ route('author-artikel') }}" class="btn btn-danger">Back</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('author-postArtikel') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{-- {{ method_field('POST') }} --}}
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select form-control" name="category_id" aria-label="Default select example">
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banner</label>
                        <input type="file" class="form-control" name="banner">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" name="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
