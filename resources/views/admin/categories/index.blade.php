@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>{{ $title }}</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Categories</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-right">
                            <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal"
                                data-original-title="test" data-bs-target="#createCategoryModal">Add New Category</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Parent Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->parent ? $category->parent->category_name : 'Main Category' }}
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm me-2 edit-button"
                                                data-id="{{ $category->id }}" data-name="{{ $category->category_name }}"
                                                data-parent="{{ $category->parent_category_id }}" data-url="{{ route('admin.category.update', $category->id) }}">
                                                Edit
                                            </a>

                                                <button class="btn btn-warning btn-sm delete-button" data-url="{{ route('admin.category.destroy', $category->id) }}">Delete</button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-center">
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createCategoryForm" method="POST" action="{{ route('admin.category.store') }}"
                        data-parsley-validate>
                        <input type="hidden" name="category_id" value="">
                        <div class="mb-3">
                            <label>Category Name</label>
                            <input type="text" name="category_name" class="form-control" required
                                data-parsley-maxlength="40"
                                data-parsley-maxlength-message="Category name must not exceed 40 characters.">
                        </div>
                        <div class="mb-3">
                            <label>Parent Category</label>
                            <select name="parent_category_id" class="form-control">
                                <option value="">Main Category</option>
                                @foreach ($categories as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-secondary" type="submit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('public/admin/assets/js/pages/category/index.js') }}"></script>
@endsection
@endsection
