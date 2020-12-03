@extends('layout.master')

@section('main')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">Biblioteca</span>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/welcome">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('libros.index')}}">Libros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('autores.index')}}">Autores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('editoriales.index')}}">Editoriales</a>
            </li>
        </ul>
        <span>{{ Auth::user()->nombre}} {{ Auth::user()->apellido}} | </span>
        <a href="{{ route('usuarios.logout') }}" class="text-danger"> Cerrar sesión</a>
    </div>
</nav>
    <h3>Libros</h3>

    <div class="row">
        <div class="col text-right">
            <a href="{{ route('libros.create') }}" class="btn btn-success ">Agregar Libro</a>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>N°</th>
                            <th>Titulo</th>
                            <th>Estado</th>
                            <th>Fecha Prestamo</th>
                            <th>Editorial</th>
                            <th></th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libros as $num=>$libro)
                        <tr>
                            <td>{{ $num+1 }}</td>
                            <td>{{ $libro->titulo }}</td>
                            <td>{{ ucwords($libro->estado) }}</td>
                            <td>{{ $libro->fecha_prestamo }}</td>
                            <td>{{ $libro->editorial->nombre }}</td>
                            {{-- <td>{{ $libro->autores}}</td> --}}
                            <td>
                                <a href="{{ route('libros.edit', $libro->id)  }}" class="btn btn-outline-primary">Editar</a>
                                <form method="POST" action="{{ route('libros.destroy', $libro->id) }}" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection