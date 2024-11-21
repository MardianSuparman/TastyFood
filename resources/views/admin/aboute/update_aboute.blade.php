@extends('layouts.admin')
@section('content')
    <div class="card card-primary card-outline m-4"> <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Quick Example</div>
            <div class="float-end">
                <a href="{{ route('aboute.index') }}" ><i class=" nav-icon bi bi-arrow-left"></i></a>
            </div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form action="{{ route('aboute.update', $aboutes->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf <!--begin::Body-->
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $aboutes->title) }}"
                        id="title" placeholder="Title" required></input>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="4" value="{{ old('content', $aboutes->content) }}"
                        placeholder="content"></textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="4" value="{{ old('deskripsi', $aboutes->deskripsi) }}"
                        placeholder="deskripsi"></textarea>
                    @error('deskripsi')
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
