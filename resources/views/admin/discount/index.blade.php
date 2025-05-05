@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h2 class="page-title">All Discounts</h2>
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
                    <h5>Discount Details</h5>

                    <a href="{{ route('admin.discount.create') }}" class="btn btn-primary">Add New Discount</a>
                </div>
                <div class="card-body">
                    <!-- <div class="row mb-3 d-flex justify-content-end align-items-center">
                        <div class="col-md-4">
                            <input type="text" id="search" class="form-control" placeholder="Search...">
                        </div>
                    </div> -->
                    <div class="table-responsive" style="overflow-y: hidden;">

                        <table class="table table-bordered" id="discountTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Discount Name</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($discounts as $discount)
                                <tr>
                                    <td>{{ $discount->id }}</td>
                                    <td>{{ $discount->name }}</td>
                                    <td>{{ $discount->code }}</td>
                                    <td>{{ ucfirst($discount->type) }}</td>
                                    <td>{{ $discount->type == 'percentage' ? rtrim(rtrim(number_format($discount->value, 2, '.', ''), '0'), '.') . '%' : number_format($discount->value, 2) }}
                                    </td>
                                    <td>{{ $discount->start_date->format('d/m/Y') }}</td>
                                    <td>{{ $discount->end_date->format('d/m/Y') }}</td>
                                    <td>{{ $discount->created_at->format('d/m/Y h:i') }}</td>
                                    <td>
                                        <a href="javascript:void(0);"
                                            class="badge {{ $discount->status == 1 ? 'badge-success' : 'badge-danger' }} toggle-status"
                                            data-id="{{ $discount->id }}">
                                            {{ $discount->status == 1 ? 'Active' : 'Inactive' }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">

                                            <a href="{{ route('admin.discount.edit', $discount->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>

                                            <button type="submit" class="btn btn-warning btn-sm delete-button" data-id="{{ $discount->id }}" data-url="{{ route('admin.discount.delete',$discount->id) }}" id="deleteButton">Delete</button>

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
                                {{ $discounts->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    var StatusUrl = "{{ route('admin.discount.status') }}";
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('public/admin/assets/js/pages/discount/index.js') }}"></script>
@endsection

@endsection