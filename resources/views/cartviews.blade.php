

<li class="dropdown cart">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    <span class="glyphicon glyphicon-shopping-cart"></span>
    <i class="icon-shopping-cart"></i>Cart[{{$itemsInCart}}]
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu dropdown-cart" role="menu">
    @foreach($items as $item)
      <li class="object-in-cart" id="{{$item->id}}">
          <span class="item">
            <span class="item-left">
              <img src="http://lorempixel.com/50/50/" alt="" />
                <span class="item-info">
                    <span>{{$item->name}}</span>
                    <span>{{$item->subtotal}}$</span>
                </span>
            </span>
            <span class="item-right">
                <button class="btn btn-xs btn-primary pull-right">x</button>
            </span>
        </span>
      </li>
      @endforeach
      <li class="divider"></li>
              <li><a class="text-center" href="">View Cart</a></li>
