@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->product_title }}</h1>
    <img src="{{ asset('storage/' . $product->images->highlighted) }}" alt="{{ $product->product_title }}" width="300">
    <p><strong>Price:</strong> ₹{{ number_format($product->mrp, 2) }}</p>
    <p><strong>Category:</strong> {{ $product->category->category_name ?? 'Uncategorized' }}</p>
    <p>{{ $product->description ?? 'No description available' }}</p>
</div>
@endsection
