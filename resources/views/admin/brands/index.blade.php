@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h2 class="page-title">All Brands</h2>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5>Brand Details</h5>

                    <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">Add New Brand</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="overflow-y: hidden;">
                        <table class="table table-bordered" id="brandTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Brand Name</th>
                                    <th>Logo</th>
                                    <th>Address</th>
                                    <th>Owner</th>
                                    <th>Phone</th>
                                   
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                
           <td>
    <img src="{{ asset('public/' . $brand->logo) }}" height="100px" alt="Logo">


</td>
                                    <td>{{ $brand->address }}</td>
                                    <td>{{ $brand->owner }}</td>
                                    <td>{{ $brand->phone }}</td>
                                
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                                            <a href="{{ route('admin.brand.delete', $brand->id) }}" class="btn btn-warning btn-sm">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Brands Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('public/admin/assets/js/pages/brand/index.js') }}"></script>
@endsection
<script type="text/javascript">
        // Handle image input
document.getElementById('logo_input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Show the preview
            const preview = document.getElementById('logo_preview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

</script>