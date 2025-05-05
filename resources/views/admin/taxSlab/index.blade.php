@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h2 class="page-title">{{$title}}</h2>
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
                    <h5>Tax Slabs Details</h5>

                    <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#createTaxModal">Add New Tax Slab</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="overflow-y: hidden;">

                        <table class="table table-bordered" id="taxtSlabTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>CGST</th>
                                    <th>SGST</th>
                                    <th>IGST</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($taxSlabs as $tax)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tax->name }}</td>
                                    <td>{{ $tax->cgst }}</td>
                                    <td>{{ $tax->sgst }}</td>
                                    <td>{{ $tax->igst }}</td>
                                    <td>{{ $tax->created_at->format('d/m/Y h:i') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">

                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm me-2 editTaxButton"
                                                data-id="{{ $tax->id }}"
                                                data-name="{{ $tax->name }}"
                                                data-cgst="{{ $tax->cgst }}"
                                                data-sgst="{{ $tax->sgst }}"
                                                data-igst="{{ $tax->igst }}"
                                                data-url="{{ route('admin.tax.slab.update', $tax->id) }}">Edit</a>

                                            <button type="submit" class="btn btn-warning btn-sm delete-button" data-id="{{ $tax->id }}" data-url="{{ route('admin.tax.slab.delete',$tax->id) }}" id="deleteButton">Delete</button>

                                        </div>
                                    </td>
                                <tr>
                                    @empty
                                <tr>
                                    <td colspan="10" class="text-center">Tax Slabs Not Added.</td>
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

<!-- Create Tax Slab Modal -->
<div class="modal fade" id="createTaxModal" tabindex="-1" role="dialog" aria-labelledby="createTaxModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTaxModalLabel">Create Tax Slab</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createTaxSlabForm" method="POST" action="{{ route('admin.tax.slab.store') }}" data-parsley-validate>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="cgst" class="form-label">CGST</label>
                        <input type="number" class="form-control" id="cgst" name="cgst" step="0.01" data-parsley-type="number" required>
                    </div>
                    <div class="mb-3">
                        <label for="sgst" class="form-label">SGST</label>
                        <input type="number" class="form-control" id="sgst" name="sgst" step="0.01" data-parsley-type="number" required>
                    </div>
                    <div class="mb-3">
                        <label for="igst" class="form-label">IGST</label>
                        <input type="number" class="form-control" id="igst" name="igst" data-parsley-type="number" required>
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
<script src="{{ asset('public/admin/assets/js/pages/taxslab/index.js') }}"></script>
@endsection

@endsection