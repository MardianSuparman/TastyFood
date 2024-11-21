{{-- resources/views/news/show.blade.php --}}
@extends('layouts.ui')
@section('TitleContent')
    <div class="content">
        <h1 class="mb-3"><b>BERITA KAMI</b></h1>
    </div>
@endsection
@section('content')
<section class="news-content">
    <div class="container">
        <div class="row">
            <!-- Bagian Gambar Misi -->
            <div class="col-12 col-md-6 mb-4">
                <img src="{{ asset('/storage/news/' . $news->image) }}" alt="News Image"
                    class="img-fluid rounded-image-news">
            </div>
            <!-- Bagian Teks Misi -->
            <div class="col-12 col-md-6  text-content-news">
                <h3><b>{{ $news->title }}</b></h3>
                <p>{{ $news->content }}</p>
                <p>{{ $news->deskripsi }}</p>

                {{-- <a href="#" class="btn-black"><b>BACA SELENGKAPNYA</b></a> --}}
                
            </div>
        </div>
    </div>
</section>
@endsection
