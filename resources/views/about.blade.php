@extends('layouts.app') <!-- use your main layout file -->

@section('title', 'About Us')

@section('content')
<style>
    .box{
gap:5px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    #myImage{
        height:200px;
        width: 200px;
        padding:50px;
        margin-top:50px;
        margin-bottom:50px;
    }
    #send-query{
        display:flex;
    }
</style>
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
        <hr>
    </div>
<!--  -->
<div id="send-query" class="p-4 mt-5 rounded">
    <img id="myImage" onclick="changeImage()" src="/images/off bulb2.jpg">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" >
        @csrf
           <h4 class="mb-3">Send Your Suggestion </h4>
        <div class="mb-2">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
        </div>
        <div class="mb-2">
            <input type="email" name="email" class="form-control" placeholder="Your Email (optional)">
        </div>
        <div class="mb-2">
            <textarea name="message" class="form-control" rows="3" placeholder="Your message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Send</button>
    </form>
</div>
<hr>
<script>
function changeImage() {
  var image = document.getElementById('myImage');
  if (image.src.match("bulbon")) {
    image.src = "/images/off bulb2.jpg";
  } else {
    image.src = "/images/on bulb.jpeg";
  }
}
</script>
    <!--  -->
    <div class="row mt-5 text-center ">
        <div class="col-md-4 box" data-aos="fade-up">
            <h4 class="text-brown">Wide Selection</h4>
            <p>Thousands of titles across genres — all in one place.</p>
        </div>
        <div class="col-md-4 box" data-aos="fade-up" data-aos-delay="100">
            <h4 class="text-brown">Fast Delivery</h4>
            <p>Get your favorite books delivered to your doorstep quickly.</p>
        </div>
        <div class="col-md-4 box" data-aos="fade-up" data-aos-delay="200">
            <h4 class="text-brown">Trusted by Readers</h4>
            <p>Join thousands of happy readers who trust Readings.</p>
        </div>
    </div>
</div>
@endsection
