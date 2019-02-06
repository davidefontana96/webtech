$(document).ready(function(){
  var baseUrl = window.location.pathname;
  console.log(baseUrl+'/reviewed');
  var numeroReview = 0;
  var itemid = 0;
  var divApp = '';
  var totfive = $('#fiveSum').text();
  var totfour = $('#fourSum').text();
  var totthree = $('#threeSum').text();
  var tottwo = $('#twoSum').text();
  var totone = $('#oneSum').text();

  $('.star').each(function(){
    var prova = $(this).children().text();
  }),

  $('.totalist').each(function(){
    numeroReview = numeroReview + 1;
    itemid = $(this).attr('itemid');
});

  divApp = $('.totalist').attr(itemid)
  $('#reviewit').click(function(){
    var full = 1;
    var testo = $('#message').val();
    var iduser = $('#userid').attr('title');
    var idshoe = $('.idshoe').attr('id');


    $('#first').siblings().each( function () {
      var prova1 = $(this).attr('class');
      if (prova1[10] == 'f')
      {
          full = full+1;
      }
  });
  var completeUrl = baseUrl+"/reviewed";
  $.get('product-detail/44/reviewed', {testo: testo, full: full, iduser:iduser, idshoe:idshoe},
            function(returned)
          {
            $('#pills-review').html(returned);
          }
      );
 });
});
