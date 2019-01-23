$(document).ready(function() {
if($("input:checkbox:not(:checked)")) console.log("not checked anyone");

 $( "input[type=checkbox]" ).on("click", function(){

// inserire la chiamata ajax con POST
console.log($(this));
if($(this). prop("checked") == true){
var url= this.value;
console.log(url);
$("input[type=checkbox]").prop("checked", false); // Unchecks it
$(this). prop("checked",true);

$('#poscarpe').
append().load(url);
}
  else {
    var rem = this.value;
    console.log(rem)
    var toremove = $(document.getElementById(rem));
    $(toremove).remove();
  }
});
});
