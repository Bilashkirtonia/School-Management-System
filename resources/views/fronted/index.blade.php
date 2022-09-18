<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School management system</title>
    <style>
        
    </style>

    <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
        rel="stylesheet"
        />
       
<style>
  img{
    width: 100%;
    height: 90vh;
  }
</style>
</head>
<body>

<!-- Carousel wrapper -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container">
      <!-- Navbar brand -->
      <a class="navbar-brand me-2" href="#" style="text-decoration: underline">
        {{-- <img
          src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
          height="16"
          alt="MDB Logo"
          loading="lazy"
          style="margin-top: -1px;"
        /> --}}
        scHool
      </a>
  
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarButtonsExample"
        aria-controls="navbarButtonsExample"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarButtonsExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
        </ul>
        <!-- Left links -->
  
        <div class="d-flex align-items-center">
          
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a style="cursor: pointer" class="nav-link" href="{{ url('login') }}">Login</a>
                </li>
              </ul>
        
            
          
        </div>
      </div>
      <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
  </nav>

<div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">

    
    <!-- Indicators -->
    {{-- <div class="carousel-indicators">
      <button
        type="button"
        data-mdb-target="#carouselBasicExample"
        data-mdb-slide-to="0"
        class="active"
        aria-current="true"
        aria-label="Slide 1"
      ></button>
      <button
        type="button"
        data-mdb-target="#carouselBasicExample"
        data-mdb-slide-to="1"
        aria-label="Slide 2"
      ></button>
      <button
        type="button"
        data-mdb-target="#carouselBasicExample"
        data-mdb-slide-to="2"
        aria-label="Slide 3"
      ></button>
    </div> --}}
    
  
    <!-- Inner -->
    <div class="carousel-inner">        
      <!-- Single item -->
      <div class="carousel-item active">
        
        <img src="{{ url('font/p3.jpg') }}" class="d-block w-100" alt="Sunset Over the City"/>
        <div class="carousel-caption d-none d-md-block">
          <h1 style="color: #000">Welcome to our school </h1>
          <p style="color: #000">Education is the freedome of a nation</p>
        </div>
      </div>
  
      <!-- Single item -->
      <div class="carousel-item">
        <img src="{{ url('font/p2.jpg') }}" class="d-block w-100" alt="Canyon at Nigh"/>
        <div class="carousel-caption d-none d-md-block">
          <h1 style="color: #000">Welcome to our school </h1>
          <p style="color: #000">Education has the power</p>
        </div>
      </div>
  
      <!-- Single item -->
      <div class="carousel-item">
        <img src="{{ url('font/p1.jpg') }}" class="d-block w-100" alt="Cliff Above a Stormy Sea"/>
        <div class="carousel-caption d-none d-md-block">
          <h1 style="color: #000">Welcome to our school </h1>
          <p style="color: #000">Education is the born of a nation</p>
        </div>
      </div>
    </div>
    <!-- Inner -->
  
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Carousel wrapper -->
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
    ></script>

</body>
</html>