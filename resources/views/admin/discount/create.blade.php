@extends('layouts.app')


<style>
    .datepicker {
        top: 232.337px !important;
    }
</style>
@section('content')

<div class="container-fluid">
    <h2 class="page-title">{{ $title }}</h2>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    Add New Discount
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.discount.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Discount Name</label>
                                    <input type="text" name="name" id="" class="form-control" placeholder="Discount Name" required
                                        data-parsley-required="true"
                                        data-parsley-minlength="3"
                                        data-parsley-maxlength="50"
                                        data-parsley-trigger="keyup"
                                        data-parsley-required-message="Please enter a discount name.">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Discount Code</label>
                                    <input type="text" name="code" id="" class="form-control" placeholder="Discount Code" data-parsley-maxlength="10"
                                        data-parsley-trigger="keyup"
                                        data-parsley-maxlength-message="Discount code must be 10 characters or less.">
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input type="text" name="description" id="" class="form-control" placeholder="Discount Description" data-parsley-maxlength="150"
                                        data-parsley-trigger="keyup"
                                        data-parsley-maxlength-message="Description must be 150 characters or less.">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="">Discount Type</label>
                                    <select name="type" id="discountType" class="form-select" required
                                        data-parsley-required-message="Please select a discount type.">
                                        <option value="">Select Discount Type</option>
                                        <option value="percentage">Percentage</option>
                                        <option value="fixed">Fixed Amount</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="">Discount Amount</label>
                                    <input type="number" name="value" id="discountValue" class="form-control" placeholder="Discount Amount" required
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
                                    <input type="text" name="start_date" class="form-control datepicker" placeholder="Start Date"
                                        required data-parsley-futuredate>
                                    @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="">End Date</label>
                                    <input type="text" name="end_date" class="form-control datepicker" placeholder="End Date"
                                        required data-parsley-futuredate>
                                    @error('end_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="">Start Date</label>
                                    <input type="text" name="start_date" id="" class="form-control datepicker" placeholder="Start Date" required>
                                    @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="">End Date</label>
                                    <input type="text" name="end_date" id="" class="form-control datepicker" placeholder="End Date" required>
                                    @error('end_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> -->

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success" data-bs-original-title="" title="">
                                    Create Discount
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

<script src="{{ asset('public/admin/assets/js/pages/discount/create.js') }}"></script>
@endsection