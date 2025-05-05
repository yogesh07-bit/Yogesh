@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="page-title">{{ $title ?? 'Add New Brand' }}</h2>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">Add New Brand</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>

                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" class="form-control" name="brand_name" required data-parsley-required-message="Brand name is required">
                            </div>

                           <div class="col-md-6 mb-3">
    <label for="logo">Logo</label>
    <input type="file" class="form-control" name="logo" id="logoInput" accept="image/*" required data-parsley-required-message="Logo is required">

    <!-- Preview Container -->
    <div class="mt-2">
        <img id="logoPreview" src="#" alt="Logo Preview" style="max-height: 150px; display: none;" class="img-thumbnail">
    </div>
</div>



                            <div class="col-md-12 mb-3">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" required data-parsley-required-message="Address is required"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="owner">Owner</label>
                                <input type="text" class="form-control" name="owner" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" required data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15">
                            </div>

                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-success">Save Brand</button>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('logoInput');
    const preview = document.getElementById('logoPreview');

    input.addEventListener('change', function () {
        const file = input.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
});
</script>
