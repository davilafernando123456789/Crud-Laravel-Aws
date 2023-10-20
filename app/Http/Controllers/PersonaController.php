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
        $datos = Persona::orderBy('id','asc')->paginate(3);
        return view('home', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Formulario de creación
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Inserción de datos
        // // Para verificar
        // print_r($_POST);

        $persona = new Persona; 
        $persona->nombre           = $request->nombre;
        $persona->paterno          = $request->paterno;
        $persona->materno          = $request->materno;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->save();

        // Redirigir a la ruta seleccionada, con un mensaje
        return redirect()->route('personas.index')->with('message', 'Agregado con éxito!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Detalles de un registro
        $persona = Persona::find($id);
        return view('show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Formulario de edición
        // test
        // echo $id;
        
        $persona = Persona::find($id);
        return view('edit', compact('persona'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Actualización de un registro
        $persona = Persona::find($id); 
        $persona->nombre           = $request->nombre;
        $persona->paterno          = $request->paterno;
        $persona->materno          = $request->materno;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->save();

        // Redirigir a la ruta seleccionada, con un mensaje
        return redirect()->route('personas.index')->with('message', 'Actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Elimina un registro
        $persona = Persona::find($id);
        $persona->delete();
        // Retornar a la lista de personas
        return redirect()->route('personas.index')->with('message', 'Registro eliminado');
    }
}
