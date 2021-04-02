@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8 pb-2">
                <a href="{{route('tambahKategori')}}" class="btn btn-primary">Tambah Kategori</a>
        </div>
        <div class="col-md-8 pt-2">
            <div class="card-header">Kategori</div>
            @foreach ($kategoris as $kategori)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h1>{{ $kategori->kategori }}</h1>
                        </div>
                        <div class="col-md-1">
                            <a href="{{ route('editKategori', $kategori->slug) }}" class="btn btn-primary">Edit</a>
                        </div>
                        <div class="col-md-1">
                            <a href="{{ route('readKategori', $kategori->slug) }}" class="btn btn-success">Read</a>
                        </div>
                        <div class="col-md-2 mx-auto">
                            <a href="{{ route('deleteKategori', $kategori->slug) }}" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
