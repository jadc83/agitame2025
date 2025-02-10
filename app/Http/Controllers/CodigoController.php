<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Codigo; // Asegúrate de importar el modelo Codigo

class CodigoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function create()
    {
        // Devolver formulario de creación
    }

    /**
     * Display the specified resource.
     */
    public function show(Codigo $codigo)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Codigo $codigo)
    {
        // Editar un código
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Codigo $codigo)
    {
        // Actualizar la reserva
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Codigo $codigo)
    {
        // Eliminar el código
    }
}
