@foreach ($noticia->comentarios as $comentario)
    <div class="mt-2 p-2 border-l-4 border-white">
        <div class="flex">
            <p class="px-2 text-white text-3xl mt-2">#C{{ $comentario->id }} </p>
            <p class="text-lg px-2 py-2 rounded-lg bg-white">#N{{$noticia->id}} {{ $comentario->contenido }}</p>
            <form action="{{route('comentarios.store')}}" method="POST">
                @csrf
                <input type="text" name="origen" id="origen" hidden value="{{$comentario->id}}">
                <div class="flex ml-4">
                    <textarea name="respuesta" id="respuesta" cols="30" rows="1" class="border rounded p-2 w-full"></textarea>
                    <button class="bg-blue-500 p-4 mx-4 rounded-xl">Responder</button>
                </div>
            </form>
        </div>

        {{-- Verificar si existen subcomentarios --}}
        <div class="p-4">
            @if ($comentario->comentarios->isNotEmpty())
                @foreach ($comentario->comentarios as $subComentario)
                    <div class="flex mt-2 p-4 border-l-4 border-white">
                        <p class="px-2 text-white text-3xl mt-2">#R{{$subComentario->id}}</p>
                        <p class="bg-white p-4 rounded-xl">{{$subComentario->contenido}}</p>
                        <form action="{{route('comentarios.store')}}" method="POST">
                            @csrf
                            <input type="text" name="origen" id="origen" hidden value="{{$comentario->id}}">
                            <div class="flex">
                                <textarea name="respuesta" id="respuesta" cols="15" rows="2" class="border rounded p-2 w-full"></textarea>
                                <button class="bg-blue-500 p-4 mx-4 rounded-xl">Responder</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            @else
                <p class="text-white">Este comentario no tiene respuestas aún.</p>
            @endif
        </div>
    </div>
@endforeach
