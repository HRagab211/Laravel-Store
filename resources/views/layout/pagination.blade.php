{{--     
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                  </a>
              </li> --}}

  @if ($paginator->hasPages())
  <div class="col-12 pb-1">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center mb-3">
            {{-- Previous Page Link --}}
          @if ($paginator->onFirstPage())
              <li class="disabled" aria-disabled="true">
                  <span aria-hidden="true">&laquo;</span>
              </li>
          
          @else
         
              <li class="page-item disabled">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($elements as $element)
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                  <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))
                  @foreach ($element as $page => $url)
                      @if ($page == $paginator->currentPage())
                          <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                      @else
                          <li><a href="{{ $url }}">{{ $page }}</a></li>
                      @endif
                  @endforeach
              @endif
          @endforeach

          {{-- Next Page Link --}}
          @if ($paginator->hasMorePages())
              <li>
                  <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
              </li>
          @else
              <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                  <span aria-hidden="true">&rsaquo;</span>
              </li>
          @endif
      </ul>
  </nav>
</div>

@endif
