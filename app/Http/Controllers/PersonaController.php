<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

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
        // Valida los campos del formulario
        $request->validate([
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'fecha_nacimiento' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        // Guarda los datos en la base de datos
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->paterno = $request->paterno;
        $persona->materno = $request->materno;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
    
        // Sube la imagen a Amazon S3 si se proporciona una
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 's3'); // 'imagenes' es la carpeta en S3 donde se almacenará la imagen
            $persona->imagen = Storage::disk('s3')->url($imagenPath);
        }
    
        $persona->save();
    
        // Redirige a la ruta seleccionada, con un mensaje
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
    
        // Elimina la imagen de S3 si existe
        if ($persona->imagen) {
            $imagenPath = basename(parse_url($persona->imagen, PHP_URL_PATH));
            Storage::disk('s3')->delete('imagenes/' . $imagenPath);
        }
    
        $persona->delete();
    
        // Retornar a la lista de personas con un mensaje
        return redirect()->route('personas.index')->with('message', 'Registro eliminado');
    }
}
