@foreach($shoes as $shoe)


    <div class="col-lg-4 mb-4 text-center" id="brands/{{$shoe->id}}/M">
      <div class="product-entry border">
        <a href="{{$shoe->id}}/product-detail" class="prod-img">
          <img src="{{$shoe->path}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
        </a>
        <div class="desc">
          <h2><a href="{{$shoe->id}}/product-detail">{{$shoe->name}}</a></h2>
          <span class="price">${{$shoe->price}}</span>
        </div>
      </div>
    </div>
{{--    <div class="w-100"></div> per andare a capo ogni volta
--}}


  @endforeach

  @if($shoes instanceof \Illuminate\Pagination\LengthAwarePaginator )

                      <div class="w-100">
                            {{$shoes->links()}}
                      </div>

  @endif
