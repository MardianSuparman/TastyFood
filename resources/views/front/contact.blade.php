@extends('layouts.ui')
@section('TitleContent')
    <div class="content">
        <h1 class="mb-3"><b>KONTAK KAMI</b></h1>
    </div>
@endsection
@section('style')
    <!-- leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endsection
@push('scripts')
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap" async
        defer></script> --}}

    {{-- <script type="module" src="{{ asset('assets/front/js/index.js') }}"></script> --}}

    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" /> --}}
@endpush
@section('content')
    <section class="contact-coontent" style="background-color: #ffffff">

        <div class="contact-form-section">
            <div class="container">
                <h2 class="news-other-title mb-5"><b>KONTAK KAMI</b></h2>
                <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject"
                                placeholder="Subject" />
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Name" required />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" required />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Message" required></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="submit-btn">KIRIM</button>
                </form>
            </div>
        </div>

        {{-- <div class="contact-form-section">
            <div class="container">
                <h2 class="news-other-title mb-5"><b>KONTAK KAMI</b></h2>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Subject" />
                        <input type="text" placeholder="Name" />
                        <input type="email" placeholder="Email" />
                    </div>
                    <div class="col-lg-6">
                        <textarea placeholder="Message"></textarea>

                    </div>
                </div>
                <a href="#" type="submit" class="submit-btn">KIRIM</a>
            </div>
        </div> --}}

        @php
            $contact = App\Models\Contact::get();
        @endphp

        @foreach ($contact as $item)
            <div class="container mb-5">
                <div class="row">
                    <div class="col-12 col-md-4 col-sm-4  contact-person">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h5>EMAIL</h5>
                        <p>{{ $item->email }}</p>
                    </div>
                    <div class="col-md-4 contact-person">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h5>PHONE</h5>
                        <p>{{ $item->NoTlpn }}</p>
                    </div>
                    <div class="col-md-4 contact-person">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5>LOCATION</h5>
                        <p>{{ $item->adres }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <section class="maps">

        {{-- <gmp-map center="43.4142989,-124.2301242" zoom="4" map-id="DEMO_MAP_ID" style="height: 400px">
            <gmp-advanced-marker position="37.4220656,-122.0840897" title="Mountain View, CA"></gmp-advanced-marker>
            <gmp-advanced-marker position="47.648994,-122.3503845" title="Seattle, WA"></gmp-advanced-marker>
        </gmp-map> --}}

        {{-- <div id="map"></div> --}}

        <div id="map">
            @php
                $contact = App\Models\Contact::first();
            @endphp
            <script>
                // Ambil alamat dari database yang dikirim melalui controller
                var adres = "{{ $contact->adres }}";
            </script>
        </div>

    </section>

    {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&libraries=marker&v=beta"
        defer></script> --}}

    {{-- <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
    ({key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg", v: "weekly"});</script> --}}

    {{-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> --}}
    {{-- <script>
        var map = L.map('map').setView([-6.943196154140334, 107.66395896086692], 20); // Koordinat Surabaya
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([-6.943196154140334, 107.66395896086692]).addTo(map).bindPopup('Lokasi Saya').openPopup();
    </script> --}}

@endsection

@push('script')
    <!-- leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('assets/front/js/index.js') }}"></script>
@endpush
