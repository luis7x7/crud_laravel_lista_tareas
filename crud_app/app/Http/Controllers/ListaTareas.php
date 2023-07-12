<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use App\Models\tareas;

class ListaTareas extends Controller
{
    public function crearTarea(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3'
        ]);
        $tareas = new tareas;
        $tareas->title = $request->title;
        $tareas->categoria_id = $request->categoria_id;
        $tareas->save();

        return redirect()->route('tareas')->with('success', 'tarea creada exitosamente');

    }

    public function getall()
    {


        $tareas = tareas::all();
        $categoria = categoria::all();
        return view('tareas.index', ['tareas' => $tareas, 'categoria' => $categoria]);

    }


    public function editar($id)
    {


        $tarea = tareas::find($id);
        return view('tareas.editar', ['tarea' => $tarea]);

    }
    public function actualizar(Request $request, $id)
    {


        $tareas = tareas::find($id);
        $tareas->title = $request->title;
        $tareas->save();

        return redirect()->route('tareas')->with('success', 'tarea actualizada exitosamente');


    }
    public function eliminar($id)
    {


        $tareas = tareas::find($id);
        $tareas->delete();
        return redirect()->route('tareas')->with('success', 'tarea eliminada exitosamente');


    }

}