$(document).ready(function
{
    fetch_shoes_data();
    function searchBar(query = '')
    {
      $.ajax({
        url:"{{route('provalog.action') }}",
        method:'GET',
        data:{query:query},
        dataType:'json'
        success:function(data)
          {
            $('#col-lg-3 mb-4 text-center').html.(data.table_data);
            $('total_records').text(data.total_data);
          }
      })
    }
});
