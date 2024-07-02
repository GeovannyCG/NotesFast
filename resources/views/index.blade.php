@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h2 class="text-white">CRUD de Tareas</h2>
            </div>
            <div>
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">Crear tarea</a>
            </div>
        </div>

        {{-- Mandar un mensaje de insercion correcta cuando el formularia sea redirecciondo con el metodo success --}}
        @if (Session::get('success'))
            <div class="alert alert-success mt-2">
                <strong>{{Session::get('success')}}</strong>
            </div>
        @endif

        <div class="col-12 mt-4">
            <table class="table table-bordered text-white">
                <tr class="text-secondary">
                    <th>Tarea</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>

                @foreach ($tasks as $task)
                <tr>
                    <td class="fw-bold">{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td>
                        {{$task->due_date}}
                    </td>
                    <td>
                        <span class="badge bg-warning fs-6">{{$task->status}}</span>
                    </td>
                    <td>
                        <a href="{{url('tasks/'.$task->id.'/edit')}}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {{-- Este componente esta activando la paginacion por medio de bootstrap --}}
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
