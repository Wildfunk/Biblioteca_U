@extends('layout.master')

@section('main')
<h3>Crear Usuario</h3>
<div class="row">
    <div class="col-12 col-lg-6 order-lg-first">
        <form method="POST" action="{{route('usuarios.store')}}">
            @csrf
            <div class="form-group">
                <label for="Rut">Rut</label>
                <input type="text" id="rut" name="rut" class="form-control">
            </div>
            <div class="form-group">
                <label for="Password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="CPassword">Confirmar Contraseña</label>
                <input type="password" id="cpassword" name="cpassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="Nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="Apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" class="form-control">
            </div>
        
            <div class="form-group">
                <a href="{{ route('inicio')}}" class="btn btn-warning">Cancelar</a>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
    </div>


    <div class="col-6 col-lg-6 order-lg-last">
        @if ($errors->any())
        <div class="card">
            <div class="text-danger alert aler-danger">
                <p>Error!</p>
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach    
                </ul>    
            </div>  
        </div>
        @endif
    </div>
</div>
    
@endsection