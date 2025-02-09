<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Models\Comentario;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{

    public $codigo = 3;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::with('comentarios.comentarios.comentarios')->get();

        return view('noticias.index', ['noticias' => $noticias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticiaRequest $request)
    {
        Comentario::create([
            'user_id' => Auth::id(),
            'contenido' => $request->respuesta,
            'comentable_type' => 'App\Models\Noticia',
            'comentable_id' => 2
        ]);

        return redirect()->route('noticias.show', 2);
    }

    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.show', ['noticia' => $noticia] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticiaRequest $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        //
    }

    public function nuevoCodigo ()
    {
        $this->codigo++;

        return $this->codigo;

    }
}
