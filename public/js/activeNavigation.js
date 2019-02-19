$(document).ready(function () {
$(function(){
    var current = location.pathname;
    console.log(location.pathname);
    $('#nav li a').each(function(){
        var $this = $(this);
        //console.log(this);

        // if the current path is like this link, make it active

        if($this.attr('href') == current){
            $this.parent().addClass("active");
            console.log($this.attr('href'));
        }
    });
});

});


/*
<li class="active"><a href="contact">Contact</a></li>
*/
