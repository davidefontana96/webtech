<!DOCTYPE HTML>
<html>
	<head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700')}}" rel="stylesheet">
 	<link href="{{asset('https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700')}}" rel="stylesheet">

 	<!-- Animate.css -->
 	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
 	<!-- Icomoon Icon Fonts-->
 	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
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
						<p class="bread"><span><a href="index">Home</a></span> / <span>About</span></p>
					</div>
				</div>
			</div>
		</div>

	</br>
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-sm-6 mb-3">
						<div class="video colorlib-video" style="background-image: url(images/about.jpg);">
							<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-play3"></i></a>
							<div class="overlay"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="about-wrap">
							<h2>Footwear the leading eCommerce Store around the Globe</h2>
							<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
							<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						</div>
					</div>
				</div>
			</div>


			@include('bottom')

	</body>
</html>
