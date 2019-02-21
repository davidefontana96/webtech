$(document).ready(function() {


  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

      $('form').on('submit', function (e) {

    //  $('.col-xs-6').on('click','#buttoncab', function(e){
          var first_name = $("input[name=first_name]").val();

          var last_name = $("input[name=last_name]").val();

          var password = $("input[name=password]").val();

          var email = $("input[name=email]").val();

          var password2 = $("input[name=password2]").val();

          var address = $("input[name=address]").val();

          var mobile = $("input[name=mobile]").val();

          var phone = $("input[name=phone]").val();


          $.ajaxPrefilter(function( options, original_Options, jqXHR ) {
            options.async = true;
          });



          $.ajax({

             method:'post',

             url:'modify',
             data:{
               _token : $('meta[name="csrf-token"]').attr('content'),
               first_name:first_name,
               last_name:last_name,
               password:password,
               email:email,
               password2:password2,
               mobile:mobile,
               phone:phone
             }}).done(function( data ) {
               if(data==1){
               Swal.fire({
                 type: 'success',
                 title: 'yuor profile has been changed',
                 showConfirmButton: false,
                 timer: 3000
               });
             }
            



         });


         e.preventDefault();






      });

    });
