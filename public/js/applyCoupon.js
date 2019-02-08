$(document).ready(function(){
  $('#applyCoupon').on('click', function(){
    var coupon = $('#mycoupon').val();
    var price = $('#subtotal').text();
    $.get('/cart/couponapply', {coupon:coupon, price:price},
          function(response)
          {
            $('.final-prices').html(response);
          }
  );
  });
});
