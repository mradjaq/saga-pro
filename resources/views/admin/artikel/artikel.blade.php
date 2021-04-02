@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts._partials.alerts')
    <div class="row justify-content-center">
        <div class="col-md-12 pb-2">
                <a href="{{route('tambahArtikel')}}" class="btn btn-primary">Tambah Artikel</a>
        </div>
        <div class="col-md-12">
            <div class="card-header">{{ __('Artikel') }}</div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Content</th>
                            <th scope="col">Banner</th>
                            <th scope="col">Option</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($artikels as $artikel)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{$artikel->title}}</td>
                                <td>{{$artikel->kategori}}</td>
                                <td>{{$artikel->content}}</td>
                                <td><img src="{{ asset('storage/' . $artikel->banner) }}" style="max-width: 300px;" alt="banner"></td>
                                <td>
                                    <a href="{{ route('editArtikel', $artikel->slug) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ route('readArtikel', $artikel->slug) }}" class="btn btn-info">Read</a>
                                    <a href="{{ route('deleteArtikel', $artikel->slug) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
