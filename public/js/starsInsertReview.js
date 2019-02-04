$(document).ready(function(e){
  e.preventDefault;
  $('#fifth').click(function(){
    $var = $('#fifth').attr('class');
    if($var === 'icon-star-empty')
    {
      $('#fifth').attr('class', 'icon-star-full');
      $('#fourth').attr('class', 'icon-star-full');
      $('#third').attr('class', 'icon-star-full');
      $('#second').attr('class', 'icon-star-full');
      $('#first').attr('class', 'icon-star-full');
    }
    });

    $('#fourth').click(function(){
      $var = $('#fourth').attr('class');
      if($var === 'icon-star-empty')
      {
        $('#fourth').attr('class', 'icon-star-full');
        $('#third').attr('class', 'icon-star-full');
        $('#second').attr('class', 'icon-star-full');
        $('#first').attr('class', 'icon-star-full');
      }
      else
      {
        $('#fifth').attr('class', 'icon-star-empty');
      }
      });

      $('#third').click(function(){
        $var = $('#third').attr('class');
        if($var === 'icon-star-empty')
        {
          $('#third').attr('class', 'icon-star-full');
          $('#second').attr('class', 'icon-star-full');
          $('#first').attr('class', 'icon-star-full');
        }
        else
        {
          $('#fourth').attr('class', 'icon-star-empty');
          $('#fifth').attr('class', 'icon-star-empty');
        }
        });

        $('#second').click(function(){
          $var = $('#second').attr('class');
          if($var === 'icon-star-empty')
          {
            $('#second').attr('class', 'icon-star-full');
            $('#first').attr('class', 'icon-star-full');
          }
          else
          {
            $('#fourth').attr('class', 'icon-star-empty');
            $('#fifth').attr('class', 'icon-star-empty');
            $('#third').attr('class', 'icon-star-empty');
          }
          });

          $('#first').click(function(){
            $var = $('#first').attr('class');
            if($var === 'icon-star-empty')
            {
              $('#first').attr('class', 'icon-star-full');
            }
            else
            {
              $('#fourth').attr('class', 'icon-star-empty');
              $('#fifth').attr('class', 'icon-star-empty');
              $('#third').attr('class', 'icon-star-empty');
              $('#second').attr('class', 'icon-star-empty');
            }
            });
  });
