@extends('layout.master')

@section('main')
    <h3>Editar Libro</h3>
    
    <div class="row">
        <div class="col-12 col-lg-6 order-lg-first">
            <form method="POST" action="{{route('libros.update', $libro->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" value="{{ $libro->titulo }}">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" name="estado" id="estado">
                        <option value="disponible" @if ($libro->estado=="disponible") selected @endif>Disponible</option>
                        <option value="prestado" @if ($libro->estado=="prestado") selected @endif>Prestado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha_prestamo">Fecha Prestamo</label>
                    <input type="date" id="fecha_prestamo" name="fecha_prestamo" class="form-control" value="{{ $libro->fecha_prestamo }}">
                </div>
                <div class="form-group">
                    <label for="editorial">Editorial</label>
                    <select name="editorial" id="editorial" class="form-control">
                        @foreach ($editoriales as $editorial)
                        <option value="{{$editorial->id}}" @if ("{{$libro->editorial_id}}"=="{{$editorial->id}}") selected @endif>{{ $editorial->nombre }} </option>                            
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <a href="{{ route('libros.index')}}" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Editar Libro</button>
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