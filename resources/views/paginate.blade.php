@if ($paginator->hasPages())
<div class="pagination-wrapper">

    <div class="pagination">

        @if ($paginator->onFirstPage())
        <!-- * Предыдущий но выключенный -->
        <div class="-page --disabled">
            <svg width="8" height="13" viewBox="0 0 8 13" fill="none">
                <path d="M7 1.5L2 6.5L7 11.5" stroke="#252525" stroke-width="1.5"/>
            </svg>
        </div>
        @else
        <!-- * Предыдущий но включенный -->
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="-page">
            <svg width="8" height="13" viewBox="0 0 8 13" fill="none">
                <path d="M7 1.5L2 6.5L7 11.5" stroke="#252525" stroke-width="1.5"/>
            </svg>
        </a>
        @endif
    
        @foreach ($elements as $element)
            @if (is_string($element))
                <!-- * Выключенная страница -->
                <div class="-page --disabled">
                    {{ $element }}
                </div>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="-page active">
                            {{ $page }}
                        </div>
                    @else
                        <a href="{{ $url }}" class="-page">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())    
            <!-- * Следующая страница -->
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="-page">
                <svg width="8" height="13" viewBox="0 0 8 13" fill="none">
                    <path d="M1 1.5L6 6.5L1 11.5" stroke="#252525" stroke-width="1.5"/>
                </svg>
            </a>
            @else
            <!-- * Следующая страница, но выключена -->
            <div class="-page --disabled">
                <svg width="8" height="13" viewBox="0 0 8 13" fill="none">
                    <path d="M1 1.5L6 6.5L1 11.5" stroke="#252525" stroke-width="1.5"/>
                </svg>
            </div>
        @endif

    </div>

</div>
@endif