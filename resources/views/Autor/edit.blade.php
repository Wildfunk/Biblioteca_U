@extends('layout.master')

@section('main')
    <h3>Editar Autor</h3>

    <div class="row">
        <div class="col-12 col-lg-6 order-lg-first">
            <form method="POST" action="{{route('autores.update', $autor->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{$autor->nombre}}">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" value="{{ $autor->apellido }}">
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{ $autor->fecha_nacimiento }}">
                </div>
                <div class="form-group">
                    <label for="nacionalidad">Pais de Nacionalidad</label>
                    <input type="text" id="pais" name="pais" class="form-control" value="{{ $autor->pais }}">
                </div>
            
                <div class="form-group">
                    <a href="{{ route('autores.show', $autor->id)}}" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Editar Autor</button>
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