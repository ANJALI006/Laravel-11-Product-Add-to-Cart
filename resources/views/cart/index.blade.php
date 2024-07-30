
@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
    <div class="container mt-4">
        <h1>Cart</h1>
        @if($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            @foreach($cartItems as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->product->name }}</h2>
                        <p class="card-text">Quantity: {{ $item->quantity }}</p>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Remove from Cart</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
    </div>
@endsection

