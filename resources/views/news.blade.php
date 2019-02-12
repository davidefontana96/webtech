@foreach ( $news as $new)


<div class="col-lg-3 mb-4 text-center">
<div class="product-entry border">
  <a href="news/detail/{{$new->id}}" class="prod-img">
    <img src="/images/{{$new->path}}" class="img-fluid" alt="Free html5 bootstrap 4 template">
  </a>
  <div class="desc">
    <h2><a href="news/{{$new->id}}">{{$new->title}}</a></h2>
  </div>
</div>
</div>
@endforeach
