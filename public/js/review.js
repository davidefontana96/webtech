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
            function(response)
          {
            var toApp = '';
            var numStar = response[1];
            if(numStar == 5)
            {
              toApp = '<i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i>'
            }
            if(numStar == 4)
            {
              toApp = '<i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i>'
            }
            if(numStar == 3)
            {
              toApp = '<i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i>'
            }
            if(numStar == 2)
            {
              toApp = '<i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i>'
            }
            if(numStar == 1)
            {
              toApp = '<i class="icon-star-full"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i>'
            }

            if(numeroReview == 0)
            {
              $('#formReview').remove();
              $('#zeroReviews').remove();
//              $('#counterReview').text('1 Reviews');
              $('#prova').prepend(
                '<h3 class="head" id="counterReview">1 Reviews</h3>'+
                '<div class="review">'+
                  '<div class="user-img" style="background-image: url({{ URL::asset('+images/person1.jpg+')}})"></div>'+
                  '<div class="desc">'+
                    '<h4>'+
                      '<span class="text-left">'+response[5]+' '+response[6]+'</span>'+
                      '<span class="text-right">'+response[4]+'</span>'+
                    '</h4>'+
                    '<p class="star">'+
                      '<span>'+
                        toApp+
                      '</span>'+
                      '<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>'+
                    '</p>'+
                    '<p>'+response[0]+'</p>'+
                  '</div>'+
                '</div>'
              );
            } else{
              $('.totalist[itemid="' + itemid + '"]').append(
                '<div class="review">'+
                  '<div class="user-img" style="background-image: url({{ URL::asset('+'images/person1.jpg'+')}})"></div>'+
                  '<div class="desc">'+
                    '<h4>'+
                      '<span class="text-left">'+response[5]+' '+response[6]+'</span>'+
                      '<span class="text-right">'+response[4]+'</span>'+
                    '</h4>'+
                    '<p class="star">'+
                      '<span>'+
                        toApp+
                      '</span>'+
                      '<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>'+
                    '</p>'+
                    '<p>'+response[0]+'</p>'+
                  '</div>'+
                '</div>'
              );
            }
          }
      );
 });
});
