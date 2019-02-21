<div class="row row-pb-lg">
  <div class="col-md-12">
    <div class="product-name d-flex">
      <div class="one-forth text-left px-4">
        <span>Product Details</span>
      </div>
      <div class="one-eight text-center">
        <span>Price</span>
      </div>
      <div class="one-eight text-center">
        <span>Quantity</span>
      </div>
      <div class="one-eight text-center">
        <span>Total</span>
      </div>
      <div class="one-eight text-center px-4">
        <span>Remove</span>
      </div>
    </div>
@foreach($elements as $element)

<div class="product-cart d-flex">
  <div class="one-forth">
    <div class="product-img" style="background-image: url(storage/{{$element->path}})">
    </div>
    <div class="display-tc">
      <h3>{{$element->name}}</h3>
    </div>
  </div>
  <div class="one-eight text-center">
    <div class="display-tc">
      <span class="price">${{$element->price}}</span>
    </div>
  </div>
  <div class="one-eight text-center">
    <div class="display-tc">
      <span class="quantity">{{$element->quantity}}</span>
    </div>
  </div>
  <div class="one-eight text-center">
    <div class="display-tc">
      <span class="price">${{$element->subtotal}}</span>
    </div>
  </div>
  <div class="one-eight text-center">
    <div class="display-tc">
      <a class="closed" id="{{$element->id}}"></a>
    </div>
  </div>
</div>

@endforeach

</div>
</div>
<div class="row row-pb-lg">
<div class="col-md-12">
  <div class="total-wrap">
    <div class="row">
      <div class="col-sm-8">
        <form action="#">
          <div class="row form-group">
            <div class="col-sm-9">

            </div>
            <div class="col-sm-3">
              <div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
              <p><a href="/checkout" class="btn btn-primary ">Go to checkout </a></p>
              </div>            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-4 text-center final-prices">
        <div class="total">
        	<div class="sub">
        		<p><span>Subtotal:</span> @if($total != 0)<span id="subtotal">${{$total}}</span>@endif</p>
        		<p><span>Delivery:</span> <span>$0.00</span></p>
        		<p><span>Discount:</span> @if(!(empty($discount)))<span>${{$discount}}</span>@else<span>$0.00</span>@endif</p>
        	</div>
        	<div class="grand-total">
        		<p><span><strong>Total:</strong></span> @if($newtotal != 0)<span>${{$newtotal}}</span>@endif</p>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
