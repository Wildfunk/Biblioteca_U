@extends('layout.master')

@section('main')
    <h3>Agregar Autor</h3>

    <div class="row">
        <div class="col-12 col-lg-6 order-lg-first">
            <form method="POST" action="{{route('autores.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control">
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nacionalidad">Pais de Nacionalidad</label>
                    <input type="text" id="pais" name="pais" class="form-control">
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" id="imagen" name="imagen" class="custom-file-input">
                        <label for="imagen" class="custom-file-label" data-browse="Examinar">Agregar Imagen</label>
                    </div>
                </div>            
                <div class="form-group">
                    <a href="{{ route('autores.index')}}" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Agregar Autor</button>
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

@section('scripts')
    <script>
        $('#imagen').on('change', function(){
            var archivo = $(this).val().replace('C:\\fakepath\\',"");
            $(this).next('.custom-file-label').html(archivo);
        })
    </script>
    
@endsection