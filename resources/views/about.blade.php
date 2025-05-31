@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<style>
    #send-query {
        display: flex;
        gap: 30px;
        background: #fff;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        border-radius: 12px;
        padding: 30px;
        align-items: center;
        max-width: 900px;
        margin: 50px auto;
    }

    #send-query img {
        height: 250px;
        width: 220px;
        cursor: pointer;
        border-radius: 12px;
        object-fit: cover;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    #send-query img:hover {
        transform: scale(1.05);
    }


    #send-query form {
        flex: 1;
    }

    #send-query h4 {
        color: #6f4e37; 
        margin-bottom: 20px;
        font-weight: 600;
        font-size: 1.8rem;
    }

    #send-query input.form-control,
    #send-query textarea.form-control {
        border-radius: 8px;
        border: 1.5px solid #ddd;
        padding: 12px 15px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    #send-query input.form-control:focus,
    #send-query textarea.form-control:focus {
        border-color: #a9746e; 
        box-shadow: 0 0 8px rgba(169,116,110, 0.3);
        outline: none;
    }

    #send-query button {
        background-color: #a9746e;
        border: none;
        padding: 12px 25px;
        font-size: 1.1rem;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        color: white;
        font-weight: 600;
        margin-top: 10px;
    }

    #send-query button:hover {
        background-color: #7a594c;
    }

  
    .alert-success {
        margin-bottom: 15px;
        border-radius: 8px;
        font-weight: 500;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 12px 15px;
    }
</style>

<div class="container py-5">
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

    <div id="send-query">
        <img id="myImage" onclick="changeImage()" src="/images/off bulb2.jpg" alt="Light Bulb Image" />

        <form method="POST" action="{{ route('suggestions.store') }}">
            @csrf

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <h4>Send Your Suggestion</h4>
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Your Email (optional)">
            </div>
            <div class="mb-3">
                <textarea name="message" class="form-control" rows="4" placeholder="Your message" required></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
    </div>

    <!-- The rest of page content -->
</div>

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

@endsection
