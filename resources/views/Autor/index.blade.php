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
        <a href="{{ route('usuarios.logout') }}" class="text-danger">Cerrar sesión</a>
    </div>
</nav>
    <h3>Autores</h3>

   <div class="row">
        <div class="col text-right">
            <a href="{{ route('autores.create') }}" class="btn btn-success ">Agregar Autor</a>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($autores as $num=>$autor)
                        <tr>
                            <td>{{ $num+1 }}</td>
                            <td>{{ $autor->nombre }}</td>
                            <td>{{ $autor->apellido }}</td>
                            <td>
                                <a href="{{ route('autores.show', $autor->id) }}" class="btn btn-info">Ver Detalles</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection