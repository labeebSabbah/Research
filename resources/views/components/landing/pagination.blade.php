<div class="pagination-wrapper">
    <ul class="pagination clearfix">
@if($paginator->hasPages())
        <li>
    @if($paginator->onFirstPage())
        <a href="#" class="btn btn-primary btn-sm disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo; </span>
        </a>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary btn-sm" rel="prev" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">&lsaquo; </span>
        </a>
    @endif
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li>
                <a href="{{ $paginator->url($i) }}" class="btn btn-primary btn-sm {{ ($paginator->currentPage() == $i) ? ' disabled' : '' }}">{{ $i }}</a>
            </li>
        @endfor
        <li>
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary btn-sm" rel="next" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&rsaquo; </span>
        </a>
    @else
        <a href="#" class="btn btn-primary btn-sm disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">&rsaquo; </span>
        </a>
    @endif
        </li>

@endif
    </ul>
</div>