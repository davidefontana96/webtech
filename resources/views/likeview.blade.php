
@if($alreadyLiked == 0)
<p id = "likehandler">
<i class="fa fa-heart-o" style="font-size:24px"></i> Liked by {{$likedBy}} people.</p>
@else
<p id = "likehandler">
<i class="fa fa-heart" style="font-size:24px"></i> Liked by {{$likedBy}} people.</p>
@endif
