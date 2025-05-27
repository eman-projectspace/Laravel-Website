@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <!-- Hero Section -->
 <!-- Carousel Section -->
<div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="carousel-image-wrapper">
        <img src="https://media.istockphoto.com/id/2147589428/photo/a-stack-of-books-with-the-words-learning-never-ends-written-on-a-chalkboard.webp?a=1&b=1&s=612x612&w=0&k=20&c=2AKRRQ0nT2JsHHvDzTBIm8T3DMExUXpCHODl5Mtk9so=" class="d-block w-100 " alt="Books Slide 1">
      </div>
    </div>

    <div class="carousel-item">
      <div class="carousel-image-wrapper">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa2Gi_fzKiUAPTXSHpsNPvFAsPTzxyP6hZ2Q&s" class="d-block w-100" alt="Books Slide 2">
      </div>
    
    </div>

    <div class="carousel-item">
      <div class="carousel-image-wrapper">
        <img src="https://media.istockphoto.com/id/1198397706/photo/library-and-text-words-have-power.webp?a=1&b=1&s=612x612&w=0&k=20&c=qBlDUAgCKngBkjrZ3pXumqTqf7cAUaBsuF1OPbq6zz4=" class="d-block w-100" alt="Books Slide 3">
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<style>
.carousel-inner img {
  width: 100%;
  height: 200px;          
  margin-bottom:30px;
}

.carousel-image-wrapper img {
  border-radius: 10px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.3);
}


@media (max-width: 768px) {
  .carousel-inner img {
    height: 250px;
  }
}

.carousel-control-prev,
.carousel-control-next {
  width: 60px;
  height: 60px;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(139, 69, 19, 0.7); /* brown with opacity */
  border-radius: 50%;
  transition: background-color 0.3s, transform 0.3s;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  background-size: 60% 60%;
  background-position: center;
  background-repeat: no-repeat;
  filter: invert(1); /* makes icon white */
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
  background-color: #8B4513; /* dark brown on hover */
  transform: translateY(-50%) scale(1.1); /* slight zoom on hover */
}

.explore-btn {
  display: inline-block;
  padding: 12px 20px;
  font-weight: bold;
  font-size: 16px;
  width: 160px;
  background: linear-gradient(to right, #8B4513, #5d4037);
  color: white;
  border-radius: 25px;
  border: none;
  transition: 0.3s ease;
  margin: 30px auto;
  display: block;
  text-align: center;
  text-decoration: none;
}
.explore-btn:hover {
  background: #3e2723;
  transform: scale(1.05);
}

  .hover-shadow:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    transform: translateY(-4px);
    transition: all 0.3s ease;
  }

</style>


<!--  Section -->
  <a href="{{ url('/shop') }}" class="explore-btn">Explore Books</a>



  <!-- Featured Highlights -->
<section style="padding: 3rem 0; background-color: #f8f9fa;">
  <div class="container">
    <h2 class="text-center mb-5" style="font-weight: bold; font-size: 2.2rem;">Most Famous Books</h2>
    <div class="row justify-content-center g-4">

      <div class="col-md-4 col-lg-3">
        <div class="card text-center shadow-sm h-100 border-0 rounded-4 hover-shadow">
          <div class="card-body p-4">
            <img src="/images/fam1.jpeg" alt="To Kill a Mockingbird" class="mb-3" style="height: 100px;">
            <h5 class="card-title fw-bold">To Kill a Mockingbird</h5>
            <p class="card-text text-muted">Harper Lee’s classic on justice and morality in the Deep South.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="card text-center shadow-sm h-100 border-0 rounded-4 hover-shadow">
          <div class="card-body p-4">
            <img src="/images/the silent patient.jpeg" alt="The Silent Patient" class="mb-3" style="height: 100px;">
            <h5 class="card-title fw-bold">The Silent Patient</h5>
            <p class="card-text text-muted">A gripping psychological thriller about silence, trauma, and truth.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="card text-center shadow-sm h-100 border-0 rounded-4 hover-shadow">
          <div class="card-body p-4">
            <img src="/images/fam2.jpeg" alt="Pride and Prejudice" class="mb-3" style="height: 100px;">
            <h5 class="card-title fw-bold">Pride and Prejudice</h5>
            <p class="card-text text-muted">Jane Austen’s timeless tale of love, class, and wit.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="card text-center shadow-sm h-100 border-0 rounded-4 hover-shadow">
          <div class="card-body p-4">
            <img src="/images/fam3.jpeg" alt="The Great Gatsby" class="mb-3" style="height: 100px;">
            <h5 class="card-title fw-bold">The Great Gatsby</h5>
            <p class="card-text text-muted">A story of extravagance, love, and the American dream.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="card text-center shadow-sm h-100 border-0 rounded-4 hover-shadow">
          <div class="card-body p-4">
            <img src="/images/fam4.jpeg" alt="The Alchemist" class="mb-3" style="height: 100px;">
            <h5 class="card-title fw-bold">The Alchemist</h5>
            <p class="card-text text-muted">A journey of self-discovery and following your dreams.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-lg-3">
        <div class="card text-center shadow-sm h-100 border-0 rounded-4 hover-shadow">
          <div class="card-body p-4">
            <img src="/images/fam5.jpeg" alt="Harry Potter" class="mb-3" style="height: 100px;">
            <h5 class="card-title fw-bold">Harry Potter Series</h5>
            <p class="card-text text-muted">The magical saga of courage, friendship, and adventure.</p>
          </div>
        </div>
      </div>

 <div class="col-md-4 col-lg-3">
        <div class="card text-center shadow-sm h-100 border-0 rounded-4 hover-shadow">
          <div class="card-body p-4">
            <img src="/images/the psychology of money.jpeg" alt="Harry Potter" class="mb-3" style="height: 100px;">
            <h5 class="card-title fw-bold">THE PSYCHOLOGY OF MONEY</h5>
            <p class="card-text text-muted">Money making methods.</p>
          </div>
        </div>
      </div>

       <div class="col-md-4 col-lg-3">
        <div class="card text-center shadow-sm h-100 border-0 rounded-4 hover-shadow">
          <div class="card-body p-4">
            <img src="/images/fam4.jpeg" alt="Think and grow rich" class="mb-3" style="height: 100px;">
            <h5 class="card-title fw-bold">THINK AND GROW RICH</h5>
            <p class="card-text text-muted">Most Famous Book.</p>
          </div>
        </div>
      </div>


    </div>
  </div>
</section>

<!--  -->
  <section class="text-center my-5">
  <h2 class="mb-4">What Readers Say</h2>
  <blockquote class="blockquote">
    <p>"Readings is my go-to bookstore. Fast shipping and a great collection!"</p>
    <footer class="blockquote-footer">Sana, <cite>Islamabad</cite></footer>
  </blockquote>
</section>
<!--  -->
<section class="text-center my-5">
  <h3 class="mb-3">Subscribe to our newsletter</h3>
  <form id="subscribeForm" class="d-flex justify-content-center gap-2">
    <input type="email" id="emailInput" placeholder="Your email" class="form-control w-25" required />
    <button type="submit" class="btn btn-brown">Subscribe</button>
  </form>
  <p id="message" class="mt-3 text-success" style="display:none;">Subscribed!</p>
</section>

<script>
  const form = document.getElementById('subscribeForm');
  const message = document.getElementById('message');
  const emailInput = document.getElementById('emailInput');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // prevent page reload

    if(emailInput.value) {
      message.style.display = 'block';  // show the subscribed message
      form.reset(); // clear input field
    }
  });
</script>


  <!-- About / Callout -->
  <section style="background:#5d4037; color:#fff; padding:3rem 0; text-align:center;">
    <h2>About Our Bookstore</h2>
    <p style="max-width:600px; margin:1rem auto;">
      Founded in 2025, Book Haven brings together a curated selection of titles for every reader. Our passion is connecting you with stories that resonate.
    </p>
    <a href="{{ url('/about') }}" class="btn btn-outline-light">Learn More</a>
  </section>
@endsection
