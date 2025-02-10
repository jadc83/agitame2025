<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::with('comentarios')->get();

        foreach ($noticias as $noticia) {
            $noticia->meneos = DB::table('noticia_usuario')
                ->where('noticia_id', $noticia->id)
                ->count();
        }


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

    public function menear(Noticia $noticia){

        $meneo = DB::table('noticia_usuario')
        ->where('user_id', Auth::id())
        ->where('noticia_id', $noticia->id)
        ->exists();

        if (!$meneo) {
            DB::table('noticia_usuario')->insert([
                ['user_id' => Auth::id(),
                'noticia_id' => $noticia->id,
                'created_at' => now(),
                'updated_at' => now()],
            ]);

            session()->flash('success', 'Noticia meneada con éxito.');

        } else {

            session()->flash('error', 'Ya has meneado esta noticia.');
        }

        return redirect()->route('noticias.index');


    }
    public function desmenear(Noticia $noticia){

        $meneo = DB::table('noticia_usuario')
        ->where('user_id', Auth::id())
        ->where('noticia_id', $noticia->id)
        ->exists();

        if ($meneo) {
            DB::table('noticia_usuario')
            ->where('user_id', Auth::id())
            ->where('noticia_id', $noticia->id)
            ->delete();

            session()->flash('success', 'Noticia desmeneada con éxito.');

        } else {

            session()->flash('error', 'No has meneado esta noticia.');
        }

        return redirect()->route('noticias.index');


    }

}
