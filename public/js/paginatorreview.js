$(function() {
           $('body').on('click', '.pagination a', function(e) {
               e.preventDefault();

               console.log("premuto");


               var url = $(this).attr('href');
               console.log(url);
               var page= $(this).attr('href').split('page=')[1];
               console.log(page);
               $.get(url, function(data){
                 console.log(data);
               $('#pills-review').html(data);
               });
           });
       });
