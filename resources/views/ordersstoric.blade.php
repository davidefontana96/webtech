@foreach($products as $product )
<div class="product-cart d-flex" >
  <div class="one-forth">
    <div class="product-img" style="background-image: url({{$product->path}});">
    </div>
    <div class="display-tc">
      <h3>{{$product->name}}</h3>
    </div>
  </div>

  <div class="one-eight text-center">
    <div class="display-tc">
      <span class="price">{{$product->created_at}}</span>
    </div>
  </div>
  <div class="one-eight text-center">
    <div class="display-tc">
      <span class="price">{{$product->quantity}}</span>
    </div> 
  </div>
  <div class="one-eight text-center">
    <div class="display-tc">
      <span class="price">{{$product->price}} $</span>
    </div>
  </div>
  <div class="one-eight text-center">
    <div class="display-tc">
      <span class="price">{{$product->subtotal}} $</span>
    </div>
  </div>
</div>
@endforeach
