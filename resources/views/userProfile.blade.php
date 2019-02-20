<!DOCTYPE HTML>
<html>

  <head>
	<title>Footwear - Free Bootstrap 4 Template by Colorlib</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
	<!-- Bootstrap  -->
  <link rel="stylesheet" href="{{asset('css/bootstrap-iso.css')}}">

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

    @include('top')

</br>

	<div class="bootstrap-iso">
<div class="container bootstrap snippet">

    <div class="row">
  		<div class="col-sm-3"><!--left col-->



            <form enctype="multipart/form-data" name="myForm" id="myForm" action="image" method="post" files="true">
              {{ csrf_field() }}
              <img src="/storage/{{ Auth::user()->avatar }}"class="avatar img-circle img-thumbnail" style="float:left; border-radius:50%; margin-right:25px;">

                <label>Update Profile Image</label>
                <input type="file" class="text-center center-block file-upload" id="avatar" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{--<input type="submit" class="pull-right btn btn-sm btn-primary">--}}
            </form>




          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Comments</strong></span> {{$reviews}}</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> {{$likes}}</li>
          </ul>



        </div><!--/col-3-->


      <div class="col-sm-9" id="html" >



                  @include('Profile')


             </div><!--/tab-pane-->



        </div><!--/col-9-->
    </div><!--/row-->
	</div>
  @include('bottom')
  </body>
</html>
