<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categori = categoria::all();
        return view('categoria.index', ['categoria' => $categori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(

            [
                'nombre' => 'required|unique:categorias|max:255',
                'color' => 'required|max:7'

            ]
        );
        $categori = new categoria();
        $categori->nombre = $request->nombre;
        $categori->color = $request->color;
        $categori->save();

        return redirect()->route('categorias')->with('success', 'nueva categoria agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria_ = categoria::find($id);

        return view('categoria.editar', ['categoria' => $categoria_]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria_ = categoria::find($id);
        $categoria_->nombre = $request->nombre;
        $categoria_->color = $request->color;
        $categoria_->save();
        return redirect()->route('categorias')->with('success', 'categoria actualizada exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria_ = categoria::find($id);
        $categoria_->tareas()->each(function ($tarea) {
            $tarea->delete();
        });
        $categoria_->delete();
        return redirect()->route('categorias')->with('success', 'tarea eliminada exitosamente');

    }
}