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
                    <img src="{{ asset('assets/front/assets/img/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="News Image"
                        class="img-fluid rounded-image-news">
                </div>
                <!-- Bagian Teks Misi -->
                <div class="col-12 col-md-6  text-content-news">
                    <h3><b>APA SAJA MAKANAN KHAS NUSANTARA?</b></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus
                        tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et
                        suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio.
                        Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ex at ante
                        volutpat</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus
                        tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et
                        suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio.
                        Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat. Duis nec ex at ante
                        volutpat</p>

                    <a href="#" class="btn-black"><b>BACA SELENGKAPNYA</b></a>
                </div>
            </div>
        </div>
    </section>

    <section class="news-other">
        <div class="container container-news">
            <h2 class="news-other-title mb-5"><b>BERITA LAINNYA</b></h2>
            <div class="row">
                @php
                    $news = App\Models\News::orderBy('id', 'asc')->get();
                    // $duplicatedNews = $news->concat($news)
                @endphp
                @foreach ($news as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="news-card">
                            <div class="aspect-ratio">
                                <img src="{{ asset('/storage/news/' . $item->image) }}"
                                    class="news-img-top" alt="Food Image">
                            </div>
                            <div class="news-body">
                                <h5 class="news-title">{{ $item->title }}</h5>
                                <p class="news-text">{{ $item->subtitle }}
                                </p>
                                <a href="#" class="read-more">Baca selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
