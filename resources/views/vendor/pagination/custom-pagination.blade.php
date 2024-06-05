@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Botón "Anterior" --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link"><</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><</a></li>
            @endif

            {{-- Números de página --}}
            @foreach ($elements as $element)
                {{-- "Tres puntos" para indicar más páginas --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array de enlaces de páginas --}}
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

            {{-- Botón "Siguiente" --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">></a></li>
            @else
                <li class="page-item disabled"><span class="page-link">></span></li>
            @endif
            
            {{-- Opciones para ir al principio o al final cuando hay más de 4 páginas --}}
            @if ($paginator->lastPage() > 4)
                {{-- Botón para ir al principio --}}
                @if (!$paginator->onFirstPage())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">Inicio</a></li>
                @endif
                {{-- Botón para ir al final --}}
                @if ($paginator->currentPage() < $paginator->lastPage())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">Final</a></li>
                @endif
            @endif
        </ul>
    </nav>
@endif
