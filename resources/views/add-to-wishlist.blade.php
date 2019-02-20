<!DOCTYPE HTML>
<html>
	<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	 	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">

	<link rel="stylesheet" href="{{asset('css/cart.css')}}">

	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('css/flexslider.css')}}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

	<style>
	.fa {
	  font-size: 50px;
	  cursor: pointer;
	  user-select: none;
	}

	.fa:hover {
	  color: red;
	}
	</style>

	</head>
	<body>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<div class="colorlib-loader"></div>

	<div id="page">
		@include('top')
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index">Home</a></span> / <span>My Wishlist</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">

				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Product Details</span>
							</div>

							<div class="one-eight text-center">
								<span></span>
							</div>
							<div class="one-eight text-center">
								<span></span>
							</div>
							<div class="one-eight text-center">
								<span>Price starting from</span>
							</div>
							<div class="one-eight text-center px-4">
								<span>Remove</span>
							</div>
						</div>
						<div class="addtowishlist">
						@include('wishview', [$products])
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>You can also like</h2>
					</div>
				</div>
				<div class="row">
					@foreach($relatedProduct as $relates)
					<div class="col-md-3 col-lg-3 mb-4 text-center">
						<div class="product-entry border">
							<a href="/shoes/{{$relates->id}}/product-detail" class="prod-img">
								<img src="{{$relates->path}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
							</a>
							<div class="desc">
								<h2><a href="/shoes/{{$relates->id}}/product-detail">{{$relates->name}}</a></h2>
								<span class="price">Price starting from</span>
								<span class="price">{{$relates->price}} $</span>
							</div>
						</div>
					</div>
					 @endforeach
				</div>
			</div>
		</div>

		@include('bottom')


	</body>
</html>
