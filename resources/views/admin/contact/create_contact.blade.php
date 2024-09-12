@extends('layouts.admin')
@section('content')
    <div class="card card-primary card-outline m-4"> <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Quick Example</div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!--begin::Body-->
            <div class="card-body">
                <div class="mb-3">
                    <label for="NoTlpn" class="form-label">No Phone</label>
                    <input type="text" class="form-control @error('NoTlpn') is-invalid @enderror" name="NoTlpn"
                        id="NoTlpn" placeholder="NoTlpn" required></input>
                    @error('NoTlpn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="email" placeholder="email" required></input>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="adres" class="form-label">Adres</label>
                    <input type="text" class="form-control @error('adres') is-invalid @enderror" name="adres"
                        id="adres" placeholder="adres" required></input>
                    @error('adres')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <button type="reset" class="btn btn-sm btn-warning">Reset</button>
            </div>
            <!--end::Footer-->
        </form> <!--end::Form-->
    @endsection
