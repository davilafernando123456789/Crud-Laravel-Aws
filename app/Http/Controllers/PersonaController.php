<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Página de inicio
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Formulario de creación
        return "Formulario de inserción";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Inserción de datos
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        // Detalles de un registro
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        // Formulario de edición
        return "Formulario para editar";

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        // Actualización de un registro
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        // Elimina un registro
    }
}
