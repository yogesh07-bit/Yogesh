@extends('layouts.app')

<style>
    .datepicker {
        top: 198.337pxpx !important;
    }
</style>

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.section') }}">Manage Sections</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $section->section_title }}</a></li>
                </ol>
            </div>
        </div>
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
                        <h5>{{ $section->section_title }} Section</h5>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test"
                            data-bs-target="#addProductModal">Add Products</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: hidden;">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Section Title</th>
                                        <th>Display Section</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sectionProducts as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->section->section_title }}</td>
                                            <td>{{ $row->section->display_section }}</td>
                                            <td>{{ $row->products->product_title }}</td>
                                            <td>{{ $row->products->category->category_name }}</td>

                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <button class="btn btn-warning btn-sm delete-button" data-url="{{ route('admin.section.product.destroy', $row->id) }}">Delete</button>
                                                </div>
                                            </td>
                                        <tr>
                                        @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No Discounts Found</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-center">

                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Search Product and Add</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <input type="hidden" name="section_id" value="{{ $section->id }}">

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h5>Categories</h5>
                                <div id="categoryTree" class="border p-2" style="max-height: 250px; overflow-y: auto;">
                                    @foreach($categories as $category)
                                        <div>
                                            <label>
                                                <input type="checkbox" class="category-checkbox" value="{{ $category->id }}">
                                                {{ $category->category_name }}
                                            </label>
                                            @foreach($category->children as $sub)
                                                <div class="ms-3">
                                                    <label>
                                                        <input type="checkbox" class="category-checkbox" value="{{ $sub->id }}">
                                                        {{ $sub->category_name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Search</label>
                                        <input type="text" id="productSearch" class="form-control" placeholder="Search product name...">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row" id="productResults">
                                            <!-- Cards will load here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary reloadPageEvent" type="button" data-bs-dismiss="modal">Close</button>
                    {{-- <button class="btn btn-secondary" type="button">Add Product</button> --}}
                </div>

            </div>
        </div>
    </div>
    <script>
        let sectionId = "{{ $section->id }}";
        let addSectionProductUrl = "{{ route('section-products.store') }}";
        let baseUrl = "{{ url('admin/section/search-products') }}";
        const baseAppUrl = "{{ url('/') }}"; // This will be http://localhost/vinayak
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('public/admin/assets/js/pages/section/productSection.js') }}"></script>
@endsection
