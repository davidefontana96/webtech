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
						<p class="bread"><span><a href="../index">Home</a></span> / <span>Men</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="breadcrumbs-two">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs-img" style="background-image: url({{ URL::asset('images/cover-img-1.jpg') }})">
							<h2>Men's</h2>
						</div>

					</div>
				</div>
			</div>
		</div>



		<div class="colorlib-product">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-xl-3">
						<div class="row">
							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Brand</h3>
									<ul>
										@foreach ($brands as $brand )

									  <li>  <input type="checkbox" name="brands[]" id="brands" value="{{$brand->id}}">

									    {{$brand->name}}</li>
									@endforeach
									</ul>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Categories</h3>
									<ul>
										@foreach ($categories as $category )
									    <li>    <input type="checkbox" name="categories[]" value="{{$category->id}}">
									{{$category->name}}</li>
									@endforeach

									</ul>
								</div>
							</div>


							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Style</h3>
									<ul>
										@foreach ($styles as $style )
									    <li>  <input type="checkbox" name="styles[]" value="{{$style->id}}"> {{$style->name}} </li>

									@endforeach
									</ul>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="side border mb-1">
									<h3>Colors</h3>
									<ul>
										<li><a href="#">Black</a></li>
										<li><a href="#">White</a></li>
										<li><a href="#">Blue</a></li>
										<li><a href="#">Red</a></li>
										<li><a href="#">Green</a></li>
										<li><a href="#">Grey</a></li>
										<li><a href="#">Orange</a></li>
										<li><a href="#">Cream</a></li>
										<li><a href="#">Brown</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-xl-9">
						<div class="row row-pb-md" id="html">


							@include('shoesviews')



						</div>

					</div>

			</div>


		<div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="{{asset('images/brand-1.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('images/brand-2.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('images/brand-3.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('images/brand-4.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="{{asset('images/brand-5.jpg')}}" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div>

		@include('bottom')

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>
	   <!-- popper -->
	   <script src="{{asset('js/popper.min.js')}}"></script>
	   <!-- bootstrap 4.1 -->
	   <script src="{{asset('js/bootstrap.min.js')}}"></script>
	   <!-- jQuery easing -->
	   <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
		<!-- Waypoints -->
		<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
		<!-- Flexslider -->
		<script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
		<!-- Owl carousel -->
		<script src="{{asset('js/owl.carousel.min.js')}}"></script>
		<!-- Magnific Popup -->
		<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('js/magnific-popup-options.js')}}"></script>
		<!-- Date Picker -->
		<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
		<!-- Stellar Parallax -->
		<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
		<!-- Main -->
		<script src="{{asset('js/main.js')}}"></script>

		<!-- Gestione ajax per brands, style e categories-->
		<script src="{{asset('js/clickbuttonshoes.js')}}"></script>
		<script src="{{asset('js/searchnav.js')}}"></script>

    <script src="{{asset('js/paginator.js')}}"></script>

    <script src="{{asset('js/activeNavigation.js')}}"></script>

		</body>
	</html>
