<nav class="colorlib-nav" role="navigation">
  <div class="top-menu">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 col-md-9">
          <div id="colorlib-logo"><a href="/index">Footwear</a></div>
        </div>
        <div class="col-sm-5 col-md-3">
          <form  class="search-wrap">
            <div class="form-group">
             <input  class="form-control search autocomplete"   id="complete" placeholder="Search Shoes or News" />
             {{ csrf_field() }}
             <button id="none"class="btn submit-search text-center " disabled><i style = " color: white;"class="icon-search"></i></button>
            </div>
         </form>
       </div>
         </div>
      <div class="row">
        <div class="col-sm-12 text-left menu-1">
          <ul id="nav">
            <li><a href="/index">index</a></li>
            <li><a href="/shoes/men">Men</a></li>
            <li><a href="/shoes/women">Women</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/news">News</a></li>
            @guest
            <li class="cart"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
            @if (Route::has('register'))
            <li class="cart"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>

            @endif
            @else
              <li class="has-dropdown cart">
              <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
              </a>
                <ul class="dropdown">
                  <li><a href="/user/profile">Profile</a></li>
                  <li><a href="/wishlist">Wishlist</a></li>
                  <li><a href="">Historical Purchase</a></li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                 </form>
               </li>
               <li class="cart"><a href="/cart"><i class="icon-shopping-cart"></i>Cart [0]</a></li>

              @endguest

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
</nav>
