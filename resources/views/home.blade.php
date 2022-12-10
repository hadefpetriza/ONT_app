<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Open+Sans:wght@500;600;700;800&family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">

    <!-- Eksternal CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Animation -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">

    <title>PT TELEKOMUNIKASI INDONESIA</title>
  </head>
  <body>
    <!-- Navigation Bar -->
    @include('layouts.nav') 

    <!-- Carousel -->
    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
		<div class="carousel-indicators">
			<button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button> 
			<button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> 
			<button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img alt="..." class="d-block w-100" src="{{ asset('images/2.jpg') }}">
				<div class="carousel-caption">
					<h5 class="animated bounceInRight shadow-text" style="animation-delay: 1s">TELKOM WITEL SUMBAR</h5>
					<p class="animated bounceInLeft d-none d-md-block shadow-text fw-normal" style="animation-delay: 2s">Website untuk memudahkan melakukan monitoring, mendetekesi ganguan layanan dan mendata semuan ONT yang digunakan oleh BGES Telkom WITEL SUMBAR</p>
					<p class="animated bounceInRight" style="animation-delay: 3s"><a href="{{ route('ont.index') }}">Check It Out!</a></p>
				</div>
			</div>
			<div class="carousel-item">
				<img alt="..." class="d-block w-100" src="{{ asset('images/1.jpg') }}">
				<div class="carousel-caption">
					<h5 class="animated slideInDown shadow-text" style="animation-delay: 1s">TELKOM WITEL SUMBAR</h5>
					<p class="animated fadeInUp d-none d-md-block shadow-text fw-normal" style="animation-delay: 2s">Website untuk memudahkan melakukan monitoring, mendetekesi ganguan layanan dan mendata semuan ONT yang digunakan oleh BGES Telkom WITEL SUMBAR</p>
					<p class="animated zoomIn" style="animation-delay: 3s"><a href="{{ route('ont.index') }}">Check It Out!</a></p>
				</div>
			</div>
			<div class="carousel-item">
				<img alt="..." class="d-block w-100" src="{{ asset('images/4.jpg') }}">
				<div class="carousel-caption">
					<h5 class="animated zoomIn shadow-text" style="animation-delay: 1s">TELKOM WITEL SUMBAR</h5>
					<p class="animated fadeInLeft d-none d-md-block shadow-text fw-normal" style="animation-delay: 2s">Website untuk memudahkan melakukan monitoring, mendetekesi ganguan layanan dan mendata semuan ONT yang digunakan oleh BGES Telkom WITEL SUMBAR</p>
					<p class="animated zoomIn" style="animation-delay: 3s"><a href="{{ route('ont.index') }}">Check It Out!</a></p>
				</div>
			</div>
		</div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button> <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
	</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>