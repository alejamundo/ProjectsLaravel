@extends('layout.base')

@section('content')
    <main class="container pt-5">
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif

        <script>
            var alertList = document.querySelectorAll(".alert");
            alertList.forEach(function(alert) {
                new bootstrap.Alert(alert);
            });
        </script>

        <div class="d-flex">

            <div class="border rounded p-3 m-3" style="width:30rem">
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf
                    <h3>Crea tareas</h3>
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" class="form-control" name="title" placeholder="Título de la tarea">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Estatus</label>
                        <select class="form-select form-select" name="status">
                            <option value="En progreso">En progreso</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Completada">Completada</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">
                        Crear
                    </button>
                </form>
            </div>

            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->status }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm m-1" href="{{route('task.edit', ['id' => $task->id])}}" role="button">Editar</a>
                                <form action="{{route('task.delete',$task->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$tasks->links()}}
    </main>
@endsection
