@foreach($elements as $element)
<div class="product-cart d-flex">
  <div class="one-forth">
    <div class="product-img" style="background-image: url(images/item-6.jpg);">
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
      <a class="closed"></a>
    </div>
  </div>
</div>

@endforeach
