<x-app-layout>
    <div class="border-b-2 p-6 w-full bg-indigo-50">
        <div class="flex flex-col items-center mx-auto w-full md:w-10/12 lg:w-9/12 xl:w-8/12">

            <a class="text-indigo-700 text-3xl hover:text-indigo-900 transition-colors duration-200 font-semibold text-center" href="{{ $noticia->url }}">#{{ $noticia->codigo }} {{ $noticia->titulo }}</a>
            <p class="text-gray-700 p-4 text-lg text-center">{{ $noticia->resumen }}</p>

            <div class="w-full mt-4">
                <form action="{{ route('comentarios.store', ['comentable_type' => 'App\Models\Noticia', 'comentable_id' => $noticia->id]) }}" method="POST">
                    @csrf
                    <div class="flex flex-col md:flex-row w-full space-x-0 md:space-x-2 space-y-2 md:space-y-0">
                        <textarea style="resize: none;" name="respuesta" id="respuesta" rows="2" class="border rounded-md p-3 w-full focus:ring-2 focus:ring-indigo-500" placeholder="Escribe tu comentario..."></textarea>
                        <x-primary-button class="flex-shrink-0 py-2 px-4 w-full md:w-auto">Comentar</x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-8 mx-auto w-full md:w-10/12 lg:w-9/12 xl:w-8/12">
            @foreach ($noticia->comentarios->sortByDesc('created_at') as $comentario)
                <x-comentario :comentario="$comentario" />
            @endforeach
        </div>
    </div>
</x-app-layout>
