{{-- Se esta importando el layouth ya preehecho --}}
@extends('layouts.base')

{{-- En la directiva con el nombre "content" asignado desde la plantilla sera donde se pinte todo el contenido --}}
@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h2>Crear Tarea</h2>
            </div>
            <div>
                <a href="{{ route('tasks.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>

        {{-- Este se encarga de mostrar los errores que hayan sucitado durante el insercion --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <strong>Error al crear la tarea</strong> Algo fue mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- se redirecciona al controlador (Teniendo en cuenta la ruta asugnada para la insersion) y sabiendo el metodo con el cual funciona "php artisan route:list"--}}
        <form action="{{ route('tasks.store') }}" method="POST">

            {{-- En Laravel, @csrf es una directiva de Blade que se utiliza para insertar un campo de token CSRF (Cross-Site Request Forgery) en un formulario HTML generado por Laravel. CSRF es un tipo de ataque en el que un atacante puede inducir a un usuario a realizar acciones no deseadas en una aplicación web en la que el usuario está autenticado. --}}
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Tarea:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Tarea">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción..."></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Fecha límite:</strong>
                        <input type="date" name="due_date" class="form-control" id="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Estado (inicial):</strong>
                        <select name="status" class="form-select" id="">
                            <option value="">-- Elige el status --</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En progreso">En progreso</option>
                            <option value="Completada">Completada</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </form>
    </div>
@endsection
