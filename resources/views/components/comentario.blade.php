<div class="mt-2 p-8 bg-indigo-500 text-white rounded-lg w-full">
    <div class="flex items-start space-x-3">
        <p class="p-4 rounded-xl font-medium text-lg w-full text-black bg-white">{{ $comentario->codigo }}: {{ $comentario->contenido }}</p>
    </div>

    <div class="flex ">
        <form class="w-2/6 mt-4" action="{{ route('comentarios.store', ['comentable_type' => 'App\Models\Comentario', 'comentable_id' => $comentario->id]) }}" method="POST" >
            @csrf
                <textarea style="resize: none;" name="respuesta" id="respuesta" rows="2" class="rounded-md w-10/12 m-4 h-12 text-black" placeholder="Escribe tu respuesta..."></textarea>
                <x-primary-button class="bg-orange-400 ml-4">Responder</x-primary-button>

        </form>
    </div>

    @foreach ($comentario->comentarios->sortByDesc('created_at') as $respuesta)
            <div class="ml-12">
                <x-comentario :comentario="$respuesta" />
            </div>
    @endforeach
</div>
