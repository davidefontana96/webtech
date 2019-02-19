
$(document).ready(function(e) {

  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);

                var form = document.forms.namedItem("myForm"); // high importance!, here you need change "yourformname" with the name of your form
                  var formData = new FormData(form); // high importance!

                  $.ajax({
                      type: 'post',
                      url: 'image',
                      contentType: false, // high importance!
                      data: formData, // high importance!
                      processData: false, // high importance!
                      success: function (data) {
                          console.log(data);

                      },
                      error: function (data) {
                          console.log('Error:', data);

                      }
                  });
            }

            reader.readAsDataURL(input.files[0]);
          //  event.preventDefault();




      /*
      $.ajax({
        url: 'image',
        type: 'POST',
        data: formData.value,
        contentType: false,
        processData: false,
        success: function(result)
        {
          console.log(result);
        }
        });

      */
        }
    }


    $(".file-upload").on('change', function(event){
        readURL(this);
    //    event.preventDefault();

    });
});
