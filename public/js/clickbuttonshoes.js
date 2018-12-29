$(document).ready(function() {
if($("input:checkbox:not(:checked)")) console.log("not checked anyone");

 $( "input[type=checkbox]" ).on("click", function(){

// inserire la chiamata ajax con POST

if($(this). prop("checked") == true){
var url= this.value;
console.log(url);
$('input[type=checkbox]').prop('checked', false); // Unchecks it
$(this). prop("checked",true);


//$( "div" ).remove( ".col-lg-4 mb-4 text-center" );
  $('#ceppa').append().load(url);
  //$window.fadeIn(300);
}
  else if($(this).prop("checked") == false){
    $('#ceppa').append().load('men1/F');
  }






});
});
