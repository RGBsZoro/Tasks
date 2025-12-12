@if ($paginator->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-3">

        {{-- Showing Text --}}
        <p class="small mb-0 me-4" style="color: #ddd;">
            Showing
            <strong>{{ $paginator->firstItem() }}</strong>
            to
            <strong>{{ $paginator->lastItem() }}</strong>
            of
            <strong>{{ $paginator->total() }}</strong>
            results
        </p>

        {{-- Pagination --}}
        <nav>
            <ul class="pagination mb-0">

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link bg-dark text-white border-secondary">Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link bg-dark text-white border-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
                    </li>
                @endif

                {{-- Page Numbers --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <span class="page-link bg-dark text-white border-secondary">{{ $element }}</span>
                        </li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <span class="page-link bg-primary border-primary">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link bg-dark text-white border-secondary" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link bg-dark text-white border-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link bg-dark text-white border-secondary">Next</span>
                    </li>
                @endif

            </ul>
        </nav>

    </div>
@endif