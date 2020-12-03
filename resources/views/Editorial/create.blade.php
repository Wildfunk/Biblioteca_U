@extends('layout.master')

@section('main')
    <h3>Agregar Editorial</h3>

    <div class="row">
        <div class="col-12 col-lg-6 order-lg-first">
            <form method="POST" action="{{route('editoriales.store')}}">
                @csrf
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control">
                </div>
                
                <div class="form-group">
                    <a href="{{ route('editoriales.index')}}" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Agregar Editorial</button>
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