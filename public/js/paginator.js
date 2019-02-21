 $(function() {
            $('body').on('click', 'li', function(e) {
                e.preventDefault();
                var url =$("a",this).attr('href');
                $.get(url, function(data){
                $('#html').html(data);
                });
            });
        });
