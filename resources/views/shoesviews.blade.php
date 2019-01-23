@foreach($shoes as $shoe)


    <div class="col-lg-4 mb-4 text-center" id="brands/{{$shoe->id}}/M">
      <div class="product-entry border">
        <a href="ok/product-detail" class="prod-img">
          <img src="{{$shoe->path}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
        </a>
        <div class="desc">
          <h2><a href="ok/product-detail">{{$shoe->name}}</a></h2>
          <span class="price">$139.00</span>
        </div>
      </div>
    </div>
{{--    <div class="w-100"></div> per andare a capo ogni volta
--}}

  @endforeach
