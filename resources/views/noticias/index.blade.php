<x-app-layout>
    @foreach ($noticias as $noticia)
        <div class="border-b-2 p-4 my-4 w-6/12 mx-auto bg-indigo-400 flex">
                <a class="text-white text-xl" href="{{ $noticia->url }}">

                    N{{ $noticia->id }}
                    {{ $noticia->titulo }}
                </a>
                <p class="mb-2">{{ $noticia->resumen }}</p>

                <a class="p-2 rounded-full text-white bg-orange-600 text-end" href="{{route('noticias.show', ['noticia' => $noticia] )}}">Ver</a>
        </div>
    @endforeach
</x-app-layout>
