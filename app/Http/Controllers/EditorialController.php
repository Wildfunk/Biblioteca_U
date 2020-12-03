<?php

namespace App\Http\Controllers;

use App\Editorial;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEditorialRequest;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editoriales= Editorial::all();
        return view('editorial.index',compact('editoriales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Editorial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditorialRequest $request)
    {
        $editorial= new Editorial();
        $editorial->nombre = $request->nombre;
        $editorial->save();
        return redirect(route('editoriales.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function show(editorial $editorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function edit(editorial $editorial)
    {
        return view('Editorial.edit',compact('editorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEditorialRequest $request, editorial $editorial)
    {
        $editorial->nombre = $request->nombre;
        $editorial->save();
        return redirect()->route('editoriales.index',$editorial->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\editorial  $editorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(editorial $editorial)
    {
        $editorial->delete();
        return redirect()->route('editoriales.index');
    }
}
