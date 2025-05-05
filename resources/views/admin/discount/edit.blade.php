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
            <h3>{{$title}}</h3>
        </div>
        <div class="col-12 col-sm-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"> <i data-feather="home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.discount')}}">Discount</a></li>
                <li class="breadcrumb-item active">Edit Discount</li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('admin.discount.update',$discount->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Discount Name</label>
                                    <input type="text" name="name" id="" value="{{ old('name',$discount->name) }}" class="form-control" placeholder="Discount Name" required>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Discount Code</label>
                                    <input type="text" name="code" id="" value="{{ old('name',$discount->code) }}" class="form-control" placeholder="Discount Code">
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" name="description" id="" value="{{ old('name',$discount->description) }}" class="form-control" placeholder="Discount Description">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="">Discount Type</label>
                                    <select name="type" id="discountType" class="form-select" required
                                        data-parsley-required-message="Please select a discount type.">
                                        <option value="">Select Discount Type</option>
                                        <option value="percentage" {{ $discount->type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                        <option value="fixed" {{ $discount->type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="">Discount Amount</label>

                                    <input type="number" name="value" id="discountValue"
                                        value="{{ old('value', $discount->type == 'percentage' ? rtrim(rtrim(number_format($discount->value, 2, '.', ''), '0'), '.') : number_format($discount->value)) }}"
                                        class="form-control"
                                        placeholder="Discount Amount"
                                        required
                                        data-parsley-trigger="keyup"
                                        data-parsley-required-message="Please enter a discount amount.">
                                    @error('value')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="">Start Date</label>
                                    <input type="text" name="start_date" value="{{ old('start_date', \Carbon\Carbon::parse($discount->start_date ?? '')->format('d/m/Y')) }}" class="form-control datepicker" placeholder="Start Date" required>
                                    @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="">End Date</label>

                                    <input type="text" name="end_date" value="{{ old('end_date', \Carbon\Carbon::parse($discount->end_date ?? '')->format('d/m/Y')) }}" class="form-control datepicker" placeholder="End Date" required>
                                    @error('end_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success" data-bs-original-title="" title="">
                                    Update Discount
                                </button>
                                <a href="{{ route('admin.discount') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('public/admin/assets/js/pages/discount/edit.js') }}"></script>
@endsection
