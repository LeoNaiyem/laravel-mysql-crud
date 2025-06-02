@extends('layouts.main')

@section('content')
    <h2>Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Add Product</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-primary">Show</a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $products->links() }}
@endsection
