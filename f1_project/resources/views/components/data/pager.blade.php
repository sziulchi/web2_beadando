@props(['paginator'])

<div style="margin-top: 1em;">
    @if ($paginator->previousPageUrl())
        <a href="{{ $paginator->previousPageUrl() }}" class="button alt small" style="color: black;">Előző</a>
    @endif
    <span>{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }} oldal ({{ $paginator->total() }} sor)</span>
    @if ($paginator->nextPageUrl())
        <a href="{{ $paginator->nextPageUrl() }}" class="button alt small" style="color: black;">Következő</a>
    @endif
</div>