<style>
.pagination li.active{
    background-color: #66bb6a !important;
}
</style>
@if ($paginator->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="#!" aria-hidden="true"><i class="material-icons">chevron_left</i></a>
                    {{-- <span class="page-link" aria-hidden="true">&lsaquo;</span> --}}
                </li>
            @else
                <li class="page-item">
                    <a href="{{ $paginator->previousPageUrl() }}"  rel="prev" aria-label="@lang('pagination.previous')"><i class="material-icons">chevron_left</i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class=" disabled" aria-disabled="true"><span class="">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><a >{{ $page }}</a></li>
                        @else
                            <li class="waves-effect"><a class="" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="material-icons">chevron_right</i></a>
                </li>
            @else
                <li class=" disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <a href="#!" aria-hidden="true"><i class="material-icons">chevron_right</i></a>
                </li>
            @endif
        </ul>
@endif
