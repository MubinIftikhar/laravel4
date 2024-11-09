
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" name="search" placeholder="Search by product ID or description" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <div class="sorting">
        <a href="{{ route('products.index', ['sort_by' => 'name']) }}">Sort by Name</a> |
        <a href="{{ route('products.index', ['sort_by' => 'price']) }}">Sort by Price</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">View</a>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $products->links() }}
</div>
@endsection
