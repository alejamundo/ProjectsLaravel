@extends('layout.base')

@section('content')
    <div class=" d-flex justify-content-center mt-5">
        <form action="" method="post" class="bg-secondary-subtle p-5 rounded" style="width:30rem">
            @csrf
            <h5>Crea tareas</h5>
            <div class="mb-3">
                <label for="" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="title" placeholder="Nombre tarea" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripción</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Estado</label>
                <select class="form-select form-select-sm" name="status">
                    <option value="Pendiente">Pendiente</option>
                    <option value="Progreso">Progreso</option>
                    <option value="Completada">Completada</option>
                </select>
            </div>
            {{-- user_id --}}
            <input type="number" class="form-control" name="user_id" value="{{$user->id}}" />


            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">
                    Crear
                </button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-primary">
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
                    {{-- mostrar tareas del usuario  --}}
                    <tr class="">
                        <td scope="row">R1C1</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
