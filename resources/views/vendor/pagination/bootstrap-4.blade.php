@if ($paginator->hasPages())
  <div class="row">
           <div class="col-md-12 text-center">
             <div class="block-27">

               <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
           <li>  <a aria-label="@lang('pagination.previous')"><i class="ion-ios-arrow-back"></i></a> </li> {{-- provo a non mettere gli li, vediamo cosa succede--}}

        @else
          <li><a href="{{ $paginator->previousPageUrl() }}"><i class="ion-ios-arrow-back"></i></a></li>

       @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon item disabled" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{--<a class="item active" href="{{ $url }}" aria-current="page">{{ $page }}</a>--}}     <li class="active"><span>{{ $page }}</span></li>

                    @else
                      {{--  <a class="item" href="{{ $url }}">{{ $page }}</a>--}} <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
          {{--<a class="icon item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="right chevron icon"></i> </a>--}}
            <li><a href="{{ $paginator->nextPageUrl() }}"><i class="ion-ios-arrow-forward"></i></a></li>

        @else
          <li><a ><i class="ion-ios-arrow-forward"></i></a></li>
        @endif
      </ul>

      </div>
</div>
</div>
@endif


{{--

              <div class="row">
                       <div class="col-md-12 text-center">
                         <div class="block-27">
                                <ul>
                                  <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li>
                                   <li class="active"><span>1</span></li>
                                   <li><a href="#">2</a></li>
                                   <li><a href="#">3</a></li>
                                   <li><a href="#">4</a></li>
                                   <li><a href="#">5</a></li>
                                   <li><a href="#"><i class="ion-ios-arrow-forward"></i></a></li>
                                </ul>
                             </div>
                       </div>
                     </div>
--}}
