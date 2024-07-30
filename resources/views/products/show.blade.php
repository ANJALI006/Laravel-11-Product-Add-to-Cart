
@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
                <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
            </div>
        </div>
    </div>
@endsection
