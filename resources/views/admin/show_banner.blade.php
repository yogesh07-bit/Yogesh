@extends('layouts.app') 
@section('content')

<div class="container-fluid">
    <h2 class="page-title">All Banners</h2>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                
                <div class="card-header pb-0">
                    Banner Details
                </div>
                <div class="card-body">
                    @if($banners->count())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Location</th>                                    
                                    <th>Name</th>                                    
                                    <th>Image</th>                                    
                                    <th>Order</th>                                    
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banners as $index => $banner)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $banner->banner_location }} </td>
                                        <td>{{ $banner->banner_name }}</td>
                                        <td><img src='{{ asset($banner->banner_image) }}' width="auto" height="100px"></td>
                                        <td>{{ $banner->banner_order }}</td>
                                       
                                        <td>{{ $banner->status==1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                          <a href="{{ route('banner.edit_slide', $banner->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            
                                            <a href="{{ route('banner.delete_slide', $banner->id) }}" class="btn btn-warning btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No banners found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
