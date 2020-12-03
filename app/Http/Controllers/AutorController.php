<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores= Autor::all();
        return view('autor.index',compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Autor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAutorRequest $request)
    {
        $autor=new Autor();
        $autor->nombre = $request->nombre;
        $autor->apellido = $request->apellido;
        $autor->fecha_nacimiento = $request->fecha_nacimiento;
        $autor->pais = $request->pais;
        $autor->imagen = $request->imagen->store('public/autores');


        $autor->save();
        return redirect(route('autores.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        return view('Autor.show', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        return view('autor.edit',compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAutorRequest $request, Autor $autor)
    {

        $autor->nombre = $request->nombre;
        $autor->apellido = $request->apellido;
        $autor->fecha_nacimiento = $request->fecha_nacimiento;
        $autor->pais = $request->pais;

        $autor->save();
        return redirect()->route('autores.show',$autor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return redirect()->route('autores.index');
    }

    public function listaLibros(Autor $autor)
    {
        $libros=$autor->libros()->orderBy('titulo')->get();
        return view('Autor.show',compact('libros'));
    }
}
