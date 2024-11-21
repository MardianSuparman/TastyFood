@extends('layouts.admin')
@section('content')
    <div class="card card-primary card-outline m-4"> <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Add Slider</div>
            <div class="float-end">
                <a href="{{ route('slider.index') }}"><i class="nav-icon bi bi-arrow-left"></i></a>
            </div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!--begin::Body-->
            <div class="card-body">
                <div class="input-group mb-3"> <input type="file" id="inputGroupFile02"
                        class="form-control
                    @error('image') is-invalid @enderror" name="image"
                        required></input>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
            </div> <!--end::Body--> <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                <button type="reset" class="btn btn-sm btn-warning">Reset</button>
            </div>
            <!--end::Footer-->
        </form> <!--end::Form-->
    @endsection
