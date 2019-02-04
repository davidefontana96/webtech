$(document).ready(function(){
  $('.quantity-left-minus').click(function() {
  });
console.log($('#quantity').attr('max'));
console.log($('#quantity').val());
var quantity = parseInt($('#quantity').val());
   $('.quantity-right-plus').click(function(e){
        var disp = $('#quantity').attr('max');
        var curr = $('#quantity').val();
        if(Number(curr) < Number(disp))
        {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        $('#quantity').val(quantity + 1);
        }

            // Increment

    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });

});
