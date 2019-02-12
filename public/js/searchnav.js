jQuery(document).ready(function($){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $('#complete').autocomplete({
          source: function (request, response) {
            $.post("/autocomplete", request, response); },
           autofocus:true,
           select: function(event,ui){
             event.preventDefault();
             console.log(ui.item)
             console.log(ui.item.type+'/'+ui.item.id)
             if(ui.item.type == 'shoes'){  window.location.href = window.location.origin + '/shoes/' + ui.item.id + '/product-detail';
              $('#cazzetti').val(window.location.origin + '/shoes/' + ui.item.id + '/product-detail')
           }
             else {
               window.location.href = window.location.origin + '/news/' + 'detail/' + ui.item.id;
               $('#cazzetti').val('cazzi');
             }
                   }

        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {


          var img ='<img src="/images/' +item.path+ '" width="30" height="30" style=" border-radius:50% "alt="Free html5 bootstrap 4 template">'
          var form ='<a>' +img +' '+ item.value +' '+ item.type +'</a>';
          return $( "<li>" )
          .data( "ui-autocomplete-item", item )
          .append( form )
          .appendTo( ul );
};



    $('#button').click(function(){
      window.location.href = $('#cazzetti').val();
    });
  });
