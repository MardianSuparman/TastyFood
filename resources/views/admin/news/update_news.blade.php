@extends('layouts.admin')
@section('content')
    <div class="card card-primary card-outline m-4"> <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Quick Example</div>
            <div class="float-end">
                <a href="{{ route('news.index') }}"><i class=" nav-icon bi bi-arrow-left"></i></a>
            </div>
        </div> <!--end::Header--> <!--begin::Form-->
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf <!--begin::Body-->
            <div class="card-body">
                <div class="input-group mb-3"> <input type="file" id="inputGroupFile02" value="{{ old('image') }}"
                        class="form-control
                    @error('image') is-invalid @enderror"
                        name="image"></input>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title', $news->title) }}" id="title" placeholder="Title" required></input>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="4"
                        value="{{ old('content', $news->content) }}" placeholder="content"></textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="4"
                        value="{{ old('deskripsi', $news->deskripsi) }}" placeholder="deskripsi"></textarea>
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
