@foreach($products as $product)
<div class="product-cart d-flex" id="{{$product->id}}">
  <div class="one-forth">
    <div class="product-img" style="background-image: url(images/item-6.jpg);">
    </div>
    <div class="display-tc">
      <h3>{{$product->name}}</h3>
    </div>
  </div>

  <div class="one-eight text-center">
    <div class="display-tc">
    </div>
  </div>
  <div class="one-eight text-center">
    <div class="display-tc">
      <span class="price"></span>
    </div>
  </div>
  <div class="one-eight text-center">
    <div class="display-tc">
      <span class="price">{{$product->price}}$</span>
    </div>
  </div>
  <div class="one-eight text-center">
    <div class="display-tc">
      <a href="#" class="closed"></a>
    </div>
  </div>
</div>
@endforeach
