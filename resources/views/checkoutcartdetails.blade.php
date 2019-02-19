<div class="cart-detail">
  <h2>Cart Total</h2>
  <ul>
    <li>
      <span>Subtotal(no shipping)</span> <span>${{$carttotal}}</span>
      <ul>
        @foreach($quantityNamePrice as $info)
        <li><span>{{$info->quantity}} x {{$info->name}}</span> <span>${{$info->subtotal}}</span></li>
        @endforeach
      </ul>
    </li>
    <li><span>Shipping</span> <span>$0.00</span></li>
    <li><span>Order Total</span> <span>${{$carttotal}}</span></li>
  </ul>
</div> 
