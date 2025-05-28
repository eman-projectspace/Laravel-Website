@extends('layouts.app') <!-- use your main layout file -->

@section('title', 'About Us')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4" data-aos="fade-right">
            <img src="{{ asset('images/reading.png') }}" alt="Bookstore Image" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6" data-aos="fade-left">
            <h2 class="mb-4 text-brown">About Readings Bookstore</h2>
            <p>Welcome to <strong>Readings</strong> — your one-stop destination for a world of stories, knowledge, and imagination. Since our inception, we've been committed to bringing you a thoughtfully curated collection of books across genres, from timeless fiction and compelling non-fiction to delightful children’s literature and historical gems.</p>
            <p>Whether you’re a casual reader or a devoted bibliophile, our mission is to make books more accessible and reading more enjoyable. We believe in the power of stories to inspire, educate, and connect people across cultures and generations.</p>
            <p>At Readings, we don’t just sell books — we celebrate them.</p>
            <a href="{{ url('/shop') }}" class="btn explore-btn mt-3">Explore Collection</a>
        </div>
    </div>

    <div class="row mt-5 text-center">
        <div class="col-md-4" data-aos="fade-up">
            <h4 class="text-brown">Wide Selection</h4>
            <p>Thousands of titles across genres — all in one place.</p>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <h4 class="text-brown">Fast Delivery</h4>
            <p>Get your favorite books delivered to your doorstep quickly.</p>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <h4 class="text-brown">Trusted by Readers</h4>
            <p>Join thousands of happy readers who trust Readings.</p>
        </div>
    </div>
</div>
@endsection
