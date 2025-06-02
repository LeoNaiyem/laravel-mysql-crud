@extends('layouts.main')

@section('content')
    <h2>
        {{ isset($product) ? 'Edit' : 'Create' }} Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">
        @csrf
        @if (isset($product))
            @method('PUT')
        @endif

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div class="mb-2">
            <label>Price</label>
            <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" class="form-control"
                required>
        </div>

        <button class="btn btn-success">{{ isset($product) ? 'Update' : 'Create' }}</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
