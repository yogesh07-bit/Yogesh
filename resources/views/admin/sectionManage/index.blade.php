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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Sections</a></li>
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
                        <h5>Manage Sections</h5>
                        <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal"
                            data-original-title="test" data-bs-target="#createSectionModal">Add Section</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-y: hidden;">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Section Title</th>
                                        <th>Page Type</th>
                                        <th>Display Section</th>
                                        <th>Product Template</th>
                                        <th>Section Template</th>
                                        <th>Display Title</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sections as $section)
                                        <tr>
                                            <td>{{ $section->id }}</td>
                                            <td>{{ $section->section_title }}</td>
                                            <td>{{ $section->page_type }}</td>
                                            <td>{{ $section->display_section }}</td>
                                            <td>{{ $section->product_template }}</td>
                                            <td>{{ $section->section_template }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $section->display_title == 1 ? 'bg-success' : 'bg-danger' }} toggle-display-title"
                                                    data-id="{{ $section->id }}" style="cursor: pointer;">
                                                    {{ $section->display_title == 1 ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge {{ $section->status == 1 ? 'bg-success' : 'bg-danger' }} toggle-status"
                                                    data-id="{{ $section->id }}" style="cursor: pointer;">
                                                    {{ $section->status == 1 ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="{{ route('admin.section.getAllProducts', $section->id) }}"
                                                        class="btn btn-secondary me-2"
                                                        style="padding: .375rem 0.75rem!important;">View</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary me-2 editSectionDetails"
                                                        data-bs-toggle="modal" data-original-title="test"
                                                        data-bs-target="#editSectionModal" data-id="{{ $section->id }}"
                                                        data-section_title="{{ $section->section_title }}"
                                                        data-product_template="{{ $section->product_template }}"
                                                        data-section_template="{{ $section->section_template }}"
                                                        data-page_type="{{ $section->page_type }}"
                                                        data-display_section="{{ $section->display_section }}"
                                                        data-display_title="{{ $section->display_title }}"
                                                        data-url="{{ route('admin.section.update', $section->id) }}"
                                                        style="padding: .375rem 0.75rem!important;">Edit</a>
                                                    <a href="javascript:void(0)"
                                                        data-url="{{ route('admin.section.destroy', $section->id) }}"
                                                        class="btn btn-danger me-2 delete-button"
                                                        style="padding: .375rem 0.75rem!important;">Delete</a>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-center">
                                    {{ $sections->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createSectionModal" tabindex="-1" role="dialog" aria-labelledby="createSectionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSectionModalLabel">Create Section</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createSectionForm" method="POST" action="{{ route('admin.section.store') }}"
                        data-parsley-validate>
                        @csrf

                        <div class="mb-3">
                            <label for="section_title" class="form-label">Section Title</label>
                            <input type="text" name="section_title" class="form-control" id="section_title"
                                placeholder="Section Title" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_template" class="form-label">Product template</label>
                            <input type="text" name="product_template" class="form-control" id="product_template"
                                placeholder="Product template" required>
                        </div>
                        <div class="mb-3">
                            <label for="section_template" class="form-label">Section template</label>
                            <input type="text" name="section_template" class="form-control" id="section_template"
                                placeholder="Section template" required>
                        </div>
                        <div class="mb-3">
                            <label for="page_type" class="form-label">Page type</label>
                            <input type="text" name="page_type" class="form-control" id="page_type"
                                placeholder="Page type" required>
                        </div>
                        <div class="mb-3">
                            <label for="display_section" class="form-label">Display section</label>
                            <input type="text" name="display_section" class="form-control" id="display_section"
                                placeholder="Display section" required>
                        </div>


                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-secondary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editSectionModal" tabindex="-1" role="dialog" aria-labelledby="editSectionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSectionModalLabel">Edit Section</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSectionForm" method="POST" data-parsley-validate>

                        <input type="text" name="id" id="section_id">
                        <div class="mb-3">
                            <label for="section_title" class="form-label">Section Title</label>
                            <input type="text" name="section_title" class="form-control" id="edit_section_title"
                                placeholder="Section Title" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_template" class="form-label">Product template</label>
                            <input type="text" name="product_template" class="form-control"
                                id="edit_product_template" placeholder="Product template" required>
                        </div>
                        <div class="mb-3">
                            <label for="section_template" class="form-label">Section template</label>
                            <input type="text" name="section_template" class="form-control"
                                id="edit_section_template" placeholder="Section template" required>
                        </div>
                        <div class="mb-3">
                            <label for="page_type" class="form-label">Page type</label>
                            <input type="text" name="page_type" class="form-control" id="edit_page_type"
                                placeholder="Page type" required>
                        </div>
                        <div class="mb-3">
                            <label for="display_section" class="form-label">Display section</label>
                            <input type="text" name="display_section" class="form-control" id="edit_display_section"
                                placeholder="Display section" required>
                        </div>


                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-secondary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        var changeTitleStatusUrl = "{{ route('admin.section.changeTitleStatus') }}";
        var changeStatusUrl = "{{ route('admin.section.changeStatus') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('public/admin/assets/js/pages/section/index.js') }}"></script>
@endsection
