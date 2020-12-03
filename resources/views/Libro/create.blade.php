@extends('layout.master')

@section('main')
    <h3>Agregar Libro</h3>
    
    <div class="row">
        <div class="col-12 col-lg-6 order-lg-first">
            <form method="POST" action="{{route('libros.store')}}">
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" id="titulo" name="titulo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" name="estado" id="estado">
                        <option value="disponible">Disponible</option>
                        <option value="prestado">Prestado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha_prestamo">Fecha Prestamo</label>
                    <input type="date" id="fecha_prestamo" name="fecha_prestamo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="editorial">Editorial</label>
                    <select name="editorial" id="editorial" class="form-control" value="">
                        @foreach ($editoriales as $editorial)
                        <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>                            
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="autor_libro">Autor</label>
                    <select id="autor_libro" name="autor_libro" class="form-control">
                        @foreach ($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->apellido }}, {{ $autor->nombre }} </option>                            
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <a href="{{ route('libros.index')}}" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Agregar Libro</button>
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