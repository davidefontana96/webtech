 $(function() {
            $('body').on('click', 'li', function(e) {
                e.preventDefault();



                var url =$("a",this).attr('href');
                console.log(url);
              //  var page= $(this).attr('href').split('page=')[1];
                //console.log(page);
                $.get(url, function(data){
                  console.log(data);
                $('#html').html(data);
                });



            });


        });
