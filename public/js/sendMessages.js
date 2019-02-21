$(document).ready(function() {


  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

      $('#buttoncab').on('click', function (e) {

    //  $('.col-xs-6').on('click','#buttoncab', function(e){
          var fname = $("input[name=fname]").val();

          var lname = $("input[name=lname]").val();

          var email = $("input[name=email]").val();

          var subject = $("input[name=subject]").val();

          var message =  $.trim($("#message").val());

          console.log('ciao');

          $.ajaxPrefilter(function( options, original_Options, jqXHR ) {
            options.async = true;
          });



          $.ajax({

             method:'post',

             url:'insertM',
             data:{
              // _token : $('meta[name="csrf-token"]').attr('content'),
               fname:fname,
               lname:lname,
               email:email,
               subject:subject,
               message:message
             }}).done(function( data ) {
               console.log(data);
               if(data==1){

               Swal.fire({
                 type: 'success',
                 title: 'yuor message has been sent',
                 showConfirmButton: false,
                 timer: 3000
               });
             }
            /*  swal({
              title: "Good job!",
              icon: "success",
              button: false,
              });
*/  e.preventDefault();



         });


         e.preventDefault();






      });

    });
