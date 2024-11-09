
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>Product ID: {{ $product->product_id }}</p>
    <p>Price: ${{ $product->price }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Stock: {{ $product->stock ?? 'N/A' }}</p>
    <p><strong>Image:</strong></p>
    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="300">
</div>
@endsection
