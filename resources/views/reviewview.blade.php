  <div class="row">
  <div class="col-md-8" id="prova">
    @if (!(empty($reviews_counter)))
     <h3 class="head prova400" id="counterReview">{{$reviews_counter}} Reviews</h3>
    @else
    <h3 class="head" id="zeroReviews">Nobody review</h3>
    @endif
    @foreach($reviews as $review)
    <div class="review totalist" itemid="{{$review->id}}" id="feedbacks">
      <div class="user-img" style="background-image: url({{$review->avatar}})"></div>
      <div class="desc">
        <h4>
          <span class="text-left">{{$review->name}} {{$review->surname}}</span>
          <span class="text-right">{{$review->created_at}}</span>
        </h4>
        <p class="star">
          <span>
            @if(($review->star) == 5)
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            @elseif(($review->star) == 4)
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-empty"></i>
            @elseif(($review->star) == 3)
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empty"></i>
            @elseif(($review->star) == 2)
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empry"></i>
            <i class="icon-star-empty"></i>
            @else(($review->star) == 1)
            <i class="icon-star-full"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empty"></i>
            @endif
          </span>
        </p>
        <p>{{$review->text}}</p>
      </div>
    </div>
    @endforeach


          @guest

          @if(!(Route::has('register')))


          @endif
          @elseif($alreadyReviewed == 0)
          <div class="review 2" id="formReview">
            <div class="user-img" style="background-image: url({{Auth::user()->avatar}})"></div>

            <div class="desc">
              <h4>
          <span class="text-left obtain-user-js" title="{{Auth::user()->id}}" id="userid">{{ Auth::user()->name }} {{ Auth::user()->surname }}, review it.</span>
          <p class ="star">
            <span id="span">
              <i class="icon-star-full" id="first"></i>
              <i class="icon-star-empty" id="second"></i>
              <i class="icon-star-empty" id="third"></i>
              <i class="icon-star-empty" id="fourth"></i>
              <i class="icon-star-empty" id="fifth"></i>
            </span>
              <span class="text-right">From 1 to 5 stars, rate it.</span>
          </p>
        </h4>
          <div class="form-group">
            <span class="text-left">
              <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about this product"></textarea>
            </span>
          </div>
          <span class="text-left">
          <div class="col-sm-12">
            <div class="form-group">
              <input id="reviewit" type="submit" value="Send Message" class="btn btn-primary">
            </div>
          </div>
        </span>
        </div>
    </div>
    @else


    @endguest



  </div>


  <div class="col-md-4">
    <div class="rating-wrap">
      <h3 class="head">All the review.</h3>
      <div class="wrap">
        <p class="star">
          @if($fivestars >= 0)
          <span>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            @if($fivepercentage >= 0)({{$fivepercentage}}%) @endif
          </span>
          <span id="fiveSum" >{{$fivestars}} Review</span>
          @endif
        </p>
        <p class="star">
          @if($fourstars >= 0)
          <span>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-empty"></i>
            @if($fourpercentage >= 0)({{$fourpercentage}}%) @endif
          </span>
          <span id="fourSum">{{$fourstars}} Review</span>
          @endif
        </p>
        <p class="star">
          @if($threestars >= 0)
          <span>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empty"></i>
            @if($threepercentage >= 0)({{$threepercentage}}%) @endif
          </span>
          <span id="threeSum">{{$threestars}} Review</span>
          @endif
        </p>
        <p class="star">
          @if($twostars >= 0)
          <span>
            <i class="icon-star-full"></i>
            <i class="icon-star-full"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empty"></i>
            @if($twopercentage >= 0)({{$twopercentage}}%) @endif
          </span>
          <span id="twoSum">{{$twostars}} Review</span>
          @endif
        </p>
        <p class="star">
          @if($onestars >= 0)
          <span>
            <i class="icon-star-full"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empty"></i>
            <i class="icon-star-empty"></i>
            @if($onepercentage >= 0)({{$onepercentage}}%) @endif
          </span>
          <span id="oneSum">{{$onestars}} Review</span>
          @endif
        </p>
      </div>
    </div>
  </div>
  @if($reviews instanceof \Illuminate\Pagination\LengthAwarePaginator )
  <div class="w-100">
            {{$reviews->links()}}
  </div>
  @endif
</div>
