@extends('layouts.main')
@section('content')
    <<div class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-box-open me-2"></i>Product Details</h4>
                <a href="{{ route('products.index') }}" class="btn btn-light"><- Back</a>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong><i class="fas fa-hashtag me-2"></i>Product ID:</strong>
                        <span class="ms-2" id="product-id">{{ $product->id }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong><i class="fas fa-tag me-2"></i>Name:</strong>
                        <span class="ms-2" id="product-name">{{ $product->name }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong><i class="fas fa-align-left me-2"></i>Description:</strong>
                        <span class="ms-2" id="product-description">{{ $product->description }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong><i class="fas fa-dollar-sign me-2"></i>Price:</strong>
                        <span class="ms-2 text-success fw-bold" id="product-price">${{ $product->price }}</span>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    @endsection
