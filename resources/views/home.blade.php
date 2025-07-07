@extends('layouts.appbar')

@section('content')
<div class="hero">
	<img src="{{ asset('images/hero.jpg') }}" alt="Hero Image">
    {{-- <div class="hero-text">
        <h1>Welcome to NorthStar!</h1>
    </div> --}}
</div>

<!-- Best Sellers -->
<div class="section-container">
    <h2 class="section-title">Our Best Seller</h2>
    <div class="grid-container">
        <div class="card">
            <img src="images/sophia-chino-blouse.jpg" alt="Sophia Chino Blouse">
            <h3>Sophia Chino Blouse</h3>
            <p>MMK 25,000</p>
        </div>
        <div class="card">
            <img src="images/verona-flare-dress.jpg" alt="Verona Flare Dress">
            <h3>Verona Flare Dress</h3>
            <p>MMK 35,000</p>
        </div>
        <div class="card">
            <img src="images/stripe-flare-shorts.jpg" alt="Stripe Flare Shorts">
            <h3>Stripe Flare Shorts</h3>
            <p>MMK 20,000</p>
        </div>
    </div>
</div>

<!-- Promotion Section -->
<div class="promotion">
    <h2>Get 50% Off</h2>
    <p>min purchase MMK 50,000</p>
    <a href="#">Shop Now</a>
</div>

<!-- Products -->
<div class="section-container">
    <h2 class="section-title">Our Products</h2>
    <div class="grid-container">
        @foreach($products as $product)
        <div class="card">
            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/default.jpg') }}" alt="{{ $product->name }}">
            <h3>{{ $product->name }}</h3>
            <p>MMK {{ $product->sale_price }}</p>
        </div>
    @endforeach
        
    </div>
</div>
@endsection