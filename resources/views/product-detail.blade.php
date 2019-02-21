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
						<p class="bread"><span><a href="index">Home</a></span> / <span>Product Details</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg product-detail-wrap">
					<div class="col-sm-8">
						@if(count($images)>1)
						<div class="owl-carousel">
							@foreach($images as $image)
							<div class="item">
								<div class="product-entry border">
									<a href="#" class="prod-img">
										<img src="/storage/{{$image->path}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
									</a>
								</div>
							</div>
							@endforeach
						</div>
					@else
						@foreach($images as $image)
						<div class="item">
							<div class="product-entry border">
								<a href="#" class="prod-img">
									<img src="/images/{{$image->path}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
								</a>
							</div>
						</div>
						@endforeach
					@endif
					</div>
					<div class="col-sm-4">
						<div class="product-desc">
							@foreach($shoes as $shoe)
							<h3 class="idshoe" id="{{$shoe->id}}">{{$shoe->name}}</h3>
							@endforeach
							<p id="wisheshandler">
							@include('productinwishview', [$alreadyWished])
						</p>
							<p class="price">
								<span id="price"></span>
								<span class="rate">
									@if((!(empty($medium)))&($medium < 1) )<i class="icon-star-empty"></i>@else<i class="icon-star-full"></i>@endif
									@if((!(empty($medium)))&($medium < 2) )<i class="icon-star-empty"></i>@else<i class="icon-star-full"></i>@endif
									@if((!(empty($medium)))&($medium < 3) )<i class="icon-star-empty"></i>@else<i class="icon-star-full"></i>@endif
									@if((!(empty($medium)))&($medium < 4) )<i class="icon-star-empty"></i>@else<i class="icon-star-full"></i>@endif
									@if((!(empty($medium)))&($medium < 5) )<i class="icon-star-empty"></i>@else<i class="icon-star-full"></i>@endif

									@if (!(empty($reviews_counter)))
									({{$reviews_counter}})
									@else
									(Nobody rates this)
									@endif
								</span>
							</p>
							@foreach($shoes as $shoe)
								 <p>{{$shoe->details}}</p>
							@endforeach
							<div class="size-wrap">
								<div class="block-26 mb-2">
									<h4>Size</h4>
				               <ul class="js-size">
												 @foreach ($measures as $measure)

				                  <li><a id="{{$measure->size_shoe}}">{{$measure->size_shoe}}</a></li>

												@endforeach
				               </ul>
				            </div>
				            <div class="block-26 mb-4">

				            </div>
							</div>
							<div class="input-group mb-4">
							 <span class="input-group-btn">
									 <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
										<i class="icon-minus2"></i>
									 </button>
								 </span>
							 <input type="text" id="quantity" name="quantity" class="form-control input-number" value="0" min="1" max="5">
							 <span class="input-group-btn ml-1">
									 <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
											<i class="icon-plus2"></i>
									</button>
							 </span>
						 </div>
                  	<div class="row">
	                  	<div class="col-sm-12 text-center">
									<p class="addtocart"><a class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Add to Cart </a></p>

								</div>
							</div>
							<div>
							</br>
							</div>

								@include('likeview', [$likedBy, $alreadyLiked])



						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-md-12 pills">
								<div class="bd-example bd-example-tabs">
								  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

								    <li class="nav-item">
								      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Description</a>
								    </li>
								    <li class="nav-item">
								      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Manufacturer</a>
								    </li>
								    <li class="nav-item">
								      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
								    </li>
								  </ul>

								  <div class="tab-content" id="pills-tabContent">
								    <div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
										 @foreach($shoes as $shoe)
										    <p>{{$shoe->details}}</p>
										 @endforeach
								    </div>

								    <div class="tab-pane border fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
										@if(!(empty($descriptionBrand)))<p>{{$descriptionBrand[0]}}</p>@else<p>Description for the brand not found!</p>@endif</div>
										<div class="tab-pane border fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">

											@include('reviewview', [$reviews_counter, $reviews, $alreadyReviewed, $fivestars, $fivepercentage, $fourstars, $fourpercentage, $threestars, $threepercentage, $twostars, $twopercentage, $onestars, $onepercentage])

										</div>
								  </div>
								</div>
				         </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('bottom')

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>
	<!-- jQuery -->
	<script src="{{asset('js/searchnav.js')}}"></script>

	<script src="{{asset('js/jquery.min.js')}}"></script>


	<script src="{{asset('js/selectSize.js')}}"></script>

	<script src="{{asset('js/addToCart.js')}}"></script>

		<script src="{{asset('js/starsInsertReview.js')}}"></script>

		<script src="{{asset('js/plusminus.js')}}"></script>

		<script src="{{asset('js/review.js')}}"></script>

		<script src="{{asset('js/rmfromcart.js')}}"></script>

		<script src="{{asset('js/like.js')}}"></script>

		<script src="{{asset('js/paginatorreview.js')}}"></script>

		<script src="{{asset('js/addtowish.js')}}"></script>

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

		<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

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

	<script src="{{asset('js/activeNavigation.js')}}"></script>






	</body>
</html>
