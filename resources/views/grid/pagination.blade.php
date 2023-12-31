<nav aria-label="Page navigation" class="float-end">
    <ul class="pagination m-0">
        <!-- Previous Page Link -->
        @if (!$paginator->onFirstPage())
            <li class="page-item previous">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        @endif

        @if(! empty($elements) && count($elements) > 1)
            @foreach ($elements as $element)
                <!-- "Three Dots" Separator -->
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                <!-- Array Of Links -->
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li class="page-item next">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        @endif
    </ul>
</nav>