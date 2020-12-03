<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Editorial;
use App\Autor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLibroRequest;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        return view("libro.index",compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editoriales = Editorial::orderBy('nombre')->get();
        $autores = Autor::orderBy('nombre')->get();
        return view('libro.create', compact('editoriales','autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibroRequest $request)
    {
        $libro =new Libro();
        $libro->titulo = $request->titulo;
        $libro->estado = "prestado";
        $libro->fecha_prestamo = null;
        $libro->editorial_id = $request->editorial;
        $libro->save();

        //interseccion
        $libro->autores()->attach($request->autor_libro);

        return redirect()->route('libros.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $editoriales = Editorial::all();
        return view('libro.edit',compact('libro'), compact('editoriales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLibroRequest $request, Libro $libro)
    {
        $libro->titulo = $request->titulo;
        $libro->estado = $request->estado;
        $libro->fecha_prestamo = $request->fecha_prestamo;
        $libro->editorial_id = $request->editorial;
        $libro->save();

        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index');
    }
}
