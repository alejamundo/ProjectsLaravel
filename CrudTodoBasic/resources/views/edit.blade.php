@extends('layout.base')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="border rounded p-3 m-3" style="width:30rem">
            <form action="{{ route('task.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h3>Editar tarea</h3>
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" name="title" placeholder="Título de la tarea" value="{{$task->title}}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" name="description" rows="3">{{$task->description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Estatus</label>
                    <select class="form-select form-select" name="status">
                        <option value="En progreso" @selected('En progreso' == $task->status)>En progreso</option>
                        <option value="Pendiente" @selected('Pendiente' == $task->status)>Pendiente</option>
                        <option value="Completada" @selected('Completada' == $task->status)>Completada</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
@endsection
