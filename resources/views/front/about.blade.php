@extends('layouts.ui')

@section('TitleContent')
    <div class="content">
        <h1 class="mb-3"><b>TENTANG KAMI</b></h1>
    </div>
@endsection

@section('content')
    <section class="tastyFood">
        <div class="container">
            <div class="row tasty-food-section">
                <div class="col-md-6 text-content-tasty">
                    <h3><b>{{ $food->title }}</b></h3>
                    <p class="paragraph">
                        <b>{{ $food->deskripsi }}</b>
                    </p>
                    <p class="paragraph2">
                        {{ $food->content }}
                    </p>
                </div>
                <div class="col-md-6 image-content d-flex justify-content-center">
                    <img src="{{ asset('assets/front/assets/img/brooke-lark-oaz0raysASk-unsplash.jpg') }}" alt="Tasty Food 1"
                        loading="lazy" class="img-fluid rounded-image">
                    <img src="{{ asset('assets/front/assets/img/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}"
                        alt="Tasty Food 2" loading="lazy" class="img-fluid rounded-image">
                </div>
            </div>
        </div>
    </section>

    <section class="visi">
        <div class="container">
            <div class="row">
                <!-- Bagian Gambar Visi -->
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="{{ asset('assets/front/assets/img/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" alt="Visi Image 1"
                        class="img-fluid rounded-image-visi">
                    <img src="{{ asset('assets/front/assets/img/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" alt="Visi Image 2"
                        class="img-fluid rounded-image-visi">
                </div>
                <!-- Bagian Teks Visi -->
                <div class="col-md-6 text-content">
                    <h3><b>{{ $visi->title }}</b></h3>
                    <p>{{ $visi->content }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="misi">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Bagian Gambar Misi -->
                <div class="col-md-6 d-flex justify-content-center align-items-center order-md-2">
                    <img src="{{ asset('assets/front/assets/img/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="Misi Image"
                        class="img-fluid rounded-image-misi">
                </div>
                <!-- Bagian Teks Misi -->
                <div class="col-md-6 text-content d-flex flex-column justify-content-center order-md-1">
                    <h3><b>{{ $misi->title }}</b></h3>
                    <p>{{ $misi->content }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
