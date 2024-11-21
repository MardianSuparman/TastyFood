@extends('layouts.front')
@section('content')
    {{-- content About --}}
    <section class="aboute mt-3" style="background-color: #ffffff">
        <div class="grid-container p-3 text-center ">
            <h2 class="m-3"><b>TENTANG KAMI</b></h2>
            <div class=" abouteText col-6 mx-center text-center" style="font-weight: semi-bold">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,
                    dui
                    diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus
                    ex.
                    Fusce sit amet viverra ante.</p>
            </div>
            <div class="black-line"></div><br>

        </div>
    </section>

    {{-- content Article --}}
    <section class="content-article">
        <div class="article">
            <div class="row">
                <!-- Card 1 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img class="card-image" src="{{ asset('assets/front/assets/img/img-1.png') }}" alt="">
                        <h2 class="card1 mb-3" style="font-family: Arial, sans-serif;">
                            <b>LOREM IPSUM</b>
                        </h2>
                        <p class="mb-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum
                            commodo.
                        </p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img class="card-image" src="{{ asset('assets/front/assets/img/img-2.png') }}" alt="">
                        <h2 class="card1 mb-3" style="font-family: Arial, sans-serif;">
                            <b>LOREM IPSUM</b>
                        </h2>
                        <p class="mb-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum
                            commodo.
                        </p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img class="card-image" src="{{ asset('assets/front/assets/img/img-3.png') }}" alt="">
                        <h2 class="card1 mb-3" style="font-family: Arial, sans-serif;">
                            <b>LOREM IPSUM</b>
                        </h2>
                        <p class="mb-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum
                            commodo.
                        </p>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img class="card-image" src="{{ asset('assets/front/assets/img/img-4.png') }}" alt="">
                        <h2 class="card1 mb-3" style="font-family: Arial, sans-serif;">
                            <b>LOREM IPSUM</b>
                        </h2>
                        <p class="mb-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum
                            commodo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- content News --}}
    <section class="content-news">
        <div class="news p-4">
            <h2 style="'Poppins', 'sans-serif'" class="m-3"><b>BERITA KAMI</b></h2>
            <div class="container-news">
                <div class="row">
                    <div class="col-md-12 col-lg-6">

                        @if ($latestNews)
                            <div class="news-card-big">
                                <div class="aspect-ratio">
                                    <img src="{{ asset('/storage/news/' . $latestNews->image) }}"
                                        style="width: 100%; height: auto;" class="news-img-top" alt="Food Image">
                                </div>
                                <div class="news-body content-news mb-auto">
                                    <h5 class="news-title"> {{ $latestNews->title }} </h5>
                                    <p class="news-text"> {{ $latestNews->content }} </p>
                                    <span class="news-text">{{ $latestNews->deskripsi }}</span>
                                    <a href="{{ route('postNews', ['slug' => $latestNews->slug]) }}"
                                        class="read-more card-news-big">Baca selengkapnya</a>
                                </div>
                            </div>
                        @else
                            <p>Data belum tersedia</p>
                        @endif

                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="row">

                            @forelse ($otherNews as $item)
                                <div class="col-sm-6">
                                    <div class="news-card mb-4">
                                        <div class="aspect-ratio">
                                            <img src="{{ asset('/storage/news/' . $item->image) }}" class="news-img-top"
                                                alt="Food Image">
                                        </div>
                                        <div class="news-body">
                                            <h5 class="news-title"> {{ Str::limit($item->title, 15, '...') }} </h5>
                                            <p class="news-text">{{ $item->content }}
                                            </p>
                                            <a href="{{ route('postNews', ['slug' => $item->slug]) }}"
                                                class="read-more">Baca selengkapnya</a>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <p>Data berita lainnya belum tersedia</p>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- content Galery --}}
    <section class="content-galery" style="background-color: #ffffff">
        <div class="galery">
            <div class="gallery-title p-3">
                <h2 class="m-3"><b>GALLERI KAMI</b></h2>
            </div>
            <div class="row gallery">

                @php
                    $galery = App\Models\Galery::orderBy('id', 'desc')->get();
                @endphp

                @forelse ($galery->take(6) as $item)
                    <div class="col-10 col-sm-4 col-md-3">
                        <div class="rounded-border">
                            <div class="square-crop">
                                <img src="{{ asset('/storage/galerys/' . $item->image) }}"
                                    class="rounded img-fluid image-shadow" alt="photo">
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            Data galeri belum tersedia.
                        </div>
                    </div>
                @endforelse

            </div>
            <div class="botten">
                <a class="btn-more" href="{{ route('gallery') }}">
                    LIHAT LEBIH BANYAK
                </a>
            </div>
        </div>
    </section>
@endsection
