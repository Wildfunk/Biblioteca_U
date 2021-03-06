<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\StoreLoginRequest;

class UsuarioController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['login','create','store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $usuario= new Usuario();
        $usuario->rut= $request->rut;

        $usuario->password= Hash::make($request->password);
        $usuario->nombre= $request->nombre;
        $usuario->apellido = $request->apellido;

        $usuario->save();
        return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login (StoreLoginRequest $request){
        $credenciales = $request->only('rut','password');
        

        if (Auth::attempt($credenciales)){
            
            return redirect('/welcome');
            
        }else{
            return redirect()->route('inicio');
        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('inicio');
    }
}
