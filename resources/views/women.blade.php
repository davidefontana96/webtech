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

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="index">Footwear</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="#" class="search-wrap">
			               <div class="form-group">
			                  <input type="search" class="form-control search" placeholder="Search">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li><a href="../index">Home</a></li>
								<li>
									<a href="men">Men</a>
								</li>
								<li class="active"><a href="women">Women</a></li>
								<li><a href="../about">About</a></li>
								<li><a href="../contact">Contact</a></li>
								@guest
								<li>
														<a href="{{ route('login') }}">{{ __('Login') }}</a>
								</li>
								@if (Route::has('register'))
								<li>
														<a href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>

								<li class="cart"><a href="cart"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
							  @endif
								@else

								<li class="has-dropdown" >
												<a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
														{{ Auth::user()->name }}
											  </a>
													<ul class="dropdown">
													<li>
															<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
													</li>
													<li class="cart"><a href="cart"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
													</ul>
																<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																		@csrf
																</form>

									</li>
									@endguest



							</ul>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="../index">Home</a></span> / <span>Women</span></p>
					</div>
				</div>
			</div>
		</div>

		<div class="breadcrumbs-two">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs-img" style="background-image: url({{ URL::asset('images/cover-img-1.jpg') }})">
							<h2>Women's</h2>
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

									  <li>  <input type="checkbox" name='brands[]' id="brands" value="{{$brand->id}}">

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


						@include('shoesviews', $shoes)



					</div>

					</div>

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

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About Footwear</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col footer-col">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="{{asset('https://colorlib.com')}}" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
<span class="block">Demo Images: <a href="{{asset('http://unsplash.co/')}}" target="_blank">Unsplash</a> , <a href="{{asset('http://pexels.com/')}}" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
		<script src="{{asset('js/jquery.min.js')}}"></script>
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

		<script src="{{asset('js/clickbuttonshoes.js')}}"></script>

		</body>
	</html>
