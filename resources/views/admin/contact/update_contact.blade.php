@extends('layouts.admin')
@section('content')
    <div class="card card-primary card-outline m-4"> <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Quick Example</div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf <!--begin::Body-->
            <div class="card-body">
                <div class="input-group mb-3"> <input type="file" id="inputGroupFile02" value="{{ old('image') }}"
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
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"
                        id="title" placeholder="Title" required></input>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="subtitle" class="form-label">Subtitle</label>
                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle') }}"
                        id="subtitle" placeholder="Subtitle" required></input>
                    @error('subtitle')
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
