<x-app-layout>
    <div class="border-b-2 p-4 m-4 mx-auto rounded-xl w-5/12 bg-indigo-500">
        <div class="flex flex-col items-center">
            <a class="text-white text-3xl" href="{{ $noticia->url }}">#{{ $noticia->codigo }} {{ $noticia->titulo }}</a>
            <p class="text-white p-4 text-xl">{{ $noticia->resumen }}</p>
            <div class="w-full mt-4">
                <form action="{{ route('comentarios.store', ['comentable_type' => 'App\\Models\\Noticia', 'comentable_id' => $noticia->id]) }}" method="POST">
                    @csrf
                    <textarea style="resize: none;" name="respuesta" id="respuesta" cols="30" rows="2" class="border rounded p-2 w-full" ></textarea>
                    <div class="flex justify-end mt-2">
                        <x-primary-button>Comentar</x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        @foreach ($noticia->comentarios->sortByDesc('created_at') as $comentario)
            <div class="mt-4 p-4 border-l-4 border-gray-300 bg-white rounded-lg shadow">
                <div class="flex items-center">
                    <p class="text-gray-600 font-bold text-xl">C{{ $comentario->codigo }} {{ $comentario->contenido }} </p>
                </div>

                <form
                    action="{{ route('comentarios.store', ['comentable_type' => 'App\\Models\\Comentario', 'comentable_id' => $comentario->id]) }}"
                    method="POST" class="w-full mt-2">
                    @csrf
                    <textarea name="respuesta" id="respuesta" cols="30" rows="2" class="border rounded p-2 w-full"></textarea>
                    <div class="flex justify-end mt-2">
                        <x-primary-button>Responder</x-primary-button>
                    </div>
                </form>

                @if ($comentario->comentarios->isNotEmpty())
                    <div class="ml-6 mt-4 border-l-2 border-gray-300 pl-4">

                        @foreach ($comentario->comentarios->sortByDesc('created_at') as $respuesta)

                            <div class="mt-2 p-3 bg-gray-100 rounded-lg">
                                <p class="text-gray-600 font-bold text-lg">R{{ $respuesta->codigo }}</p>
                                <p class="text-gray-800">{{ $respuesta->contenido }}</p>

                                <form action="{{ route('comentarios.store', ['comentable_type' => 'App\\Models\\Comentario', 'comentable_id' => $respuesta->id]) }}"
                                    method="POST" class="w-full mt-2">
                                    @csrf
                                    <textarea name="respuesta" id="respuesta" cols="30" rows="2" class="border rounded p-2 w-full"></textarea>
                                    <div class="flex justify-end mt-2">
                                        <x-primary-button>Responder</x-primary-button>
                                    </div>
                                </form>

                                @if ($respuesta->comentarios->isNotEmpty())
                                    <div class="ml-6 mt-2 border-l-2 border-gray-300 pl-4">

                                        @foreach ($respuesta->comentarios as $subrespuesta)
                                            <div class="mt-2 p-3 bg-gray-200 rounded-lg">
                                                <p class="text-gray-700">{{ $subrespuesta->contenido }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
