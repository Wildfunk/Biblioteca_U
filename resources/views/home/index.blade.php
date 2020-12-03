@extends('layout.master')

@section('main')

<div class="row">
    <div class="col-6 offset-3 mt-3">
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
    <div class="col-6 offset-3 mt-3">
        <div class="card">
            <div class="card-header">Biblioteca</div>
            <div class="card-body">
                <h5 class="card-title">Iniciar sesión</h5>
                <form method="POST" action=" {{route('usuarios.login')}} ">
                    @csrf
                    <div class="form-group">
                        <label for="rut">Rut</label>
                        <input type="text" id="rut" name="rut" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        
                        <a href="{{ route('usuarios.create') }}" class="btn btn-link">Registrate</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
</div>






















@endsection