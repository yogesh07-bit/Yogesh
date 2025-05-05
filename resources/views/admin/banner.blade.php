@extends(‘layouts.app’) 
@section(‘content’)

<div class=”container-fluid”>
    <h2 class=”page-title”>{{ $banner->id ? ‘Edit Banner’ : ‘Add Banner’ }}</h2>
</div>

<div class=”container-fluid”>
    <div class=”row”>
        <div class=”col-sm-12”>
            <div class=”card”>
                <div class=”card-header pb-0”>
                    Banner Details
                </div>
                <div class=”card-body”>
                    <form action=”{{ route(‘admin.banner.store’) }}” method=”POST” enctype=”multipart/form-data”>
                        @csrf
                        <input type=”hidden” name=”id” value=”{{ $banner->id }}”>

                        <div class=”form-group”>
                            <label>Banner Location</label>
                            <input type=”text” name=”banner_location” class=”form-control” value=”{{ $banner->banner_location }}” required>
                        </div>

                        <div class=”form-group”>
                            <label>Banner Name</label>
                            <input type=”text” name=”banner_name” class=”form-control” value=”{{ $banner->banner_name }}”>
                        </div>

                        <div class=”form-group”>
                            <label>Banner Text HTML</label>
                            <textarea name=”banner_text_html” class=”form-control”>{{ $banner->banner_text_html }}</textarea>
                        </div>

                        <div class=”form-group”>
                            <label>Banner Button</label>
                            <input type=”text” name=”banner_button” class=”form-control” value=”{{ $banner->banner_button }}”>
                        </div>

                        <div class=”form-group”>
                            <label>Banner Link</label>
                            <input type=”url” name=”banner_link” class=”form-control” value=”{{ $banner->banner_link }}”>
                        </div>

                        <div class=”form-group”>
                            <label>Banner Image</label>
                            <input type=”file” name=”banner_image” class=”form-control”>
                            @if($banner->banner_image)
                                <img src=”{{ asset(‘storage/’ . $banner->banner_image) }}” class=”mt-2” width=”150”>
                            @endif
                        </div>

                        <button type=”submit” class=”btn btn-primary”>Save Banner</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
