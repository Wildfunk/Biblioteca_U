@extends('layout.master')

@section('main')
    <h3>Detalle autor</h3>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card">
                <img src="{{ Storage::url($autor->imagen) }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><u>{{$autor->nombre}} {{$autor->apellido}}</u></h5>
                    <p class="card-text">Fecha de Nacimiento: {{ date('d-m-Y', strtotime($autor->fecha_nacimiento)) }}</p>
                    <p class="card-text">Pais de Nacionalidad: {{ $autor->pais }}</p>
                    <p class="card-text">Libros registrados:</p>
                    @if ($autor->libros->count()==0)
                        <p class="card-text">Sin libros registrados</p>
                    @else
                        @foreach ($autor->libros as $libro)
                            <p class="card-text"> - {{$libro->titulo}} , Editorial: {{$libro->editorial->nombre}}</p>
                        @endforeach
                    @endif
                    
                    
                   
                    
                    
                    

                    <div>
                        <a href="{{ route('autores.index') }}" class="btn btn-outline-primary">Volver</a>
                        <a href="{{ route('autores.edit', $autor->id)  }}" class="btn btn-primary">Editar</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#borrarAutorModal">Borrar Autor</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="borrarAutorModal" tabindex="-1" role="dialog" aria-labelledby="borrarAutorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="borrarAutorModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Desea borrar al autor {{ $autor->nombre}} {{$autor->apellido}}?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('autores.destroy', $autor->id) }}" >
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Borrar Autor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection