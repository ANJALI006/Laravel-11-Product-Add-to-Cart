@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Products</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        {{-- <img class="card-img-top" src="path_to_product_image/{{ $product->image }}" alt="{{ $product->name }}"> --}}
                        <div class="card-body">
                            <h4 class="card-title">{{ $product->name }}</h4>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
