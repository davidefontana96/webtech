$(document).ready(function(){
  $('.quantity-left-minus').click(function() {
  });

var quantity = parseInt($('#quantity').val());
   $('.quantity-right-plus').click(function(e){
        var disp = $('#quantity').attr('max');
        var curr = $('#quantity').val();
        if(Number(curr) < Number(disp))
        {
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
        $('#quantity').val(quantity + 1);
        }
    });

     $('.quantity-left-minus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });

});
