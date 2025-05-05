@extends('layouts.app') 
@section('content')

<div class="container-fluid">
    <h2 class="page-title">All Banners</h2>
</div>

<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
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
                                    <th>Banner Name</th>                                    
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
                                       
                                        <td>{{ $banner->status==1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('banner.show', $banner->banner_location) }}" class="btn btn-primary btn-sm">Show</a>
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
