{{-- Footer --}}



<section class="content-footer">
    <div class="footer">
        <div class="row">
            <div class="col-md-6">
                <h5>Tasty Food</h5>
                <p class="coustom-paragraf">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.</p>
                <div class="social-icons m-2">
                    <a href="#" class="facebook fa-brands fa-facebook"></a>
                    <a href="#" class="twitter fa-brands fa-twitter"></a>
                </div>
            </div>
            <div class="col-md-2">
                <h5>Useful links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Hewan</a></li>
                    <li><a href="{{ route('gallery') }}">Galeri</a></li>
                    <li><a href="#">Testimonial</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5>Privacy</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Karir</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('contact') }}">Kontak Kami</a></li>
                    <li><a href="#">Servis</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5>Contact Info</h5>
                @php
                    $item = App\Models\Contact::first();
                @endphp
                <ul class="list-unstyled contact-info">
                    {{-- @foreach ($contact as $item) --}}
                        <li><i class="fas fa-envelope"></i>{{ $item->email }}</li>
                        <li><i class="fas fa-phone"></i>{{ $item->NoTlpn }}</li>
                        <li><i class="fas fa-map-marker-alt"></i> {{ $item->adres }} </li>
                    {{-- @endforeach --}}
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright ©2024 All rights reserved</p>
        </div>
    </div>
</section>
