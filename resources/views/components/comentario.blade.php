<div class="flex ml-4 border-l-2 border-gray-400 pl-4">
    <p class="ml-4"><strong>-></strong> {{ $comentario->contenido }}</p>

    {{-- Verifica si el comentario tiene respuestas --}}
    @if ($comentario->comentarios->isNotEmpty())
        <div class="ml-4 border-l-2 border-gray-500 pl-4">
            @foreach ($comentario->comentarios as $subComentario)
                <x-comentario :comentario="$subComentario" />
            @endforeach
        </div>
    @else
        <p>No hay respuestas para este comentario.</p>
    @endif
</div>
