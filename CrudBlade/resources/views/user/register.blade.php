@extends('layout.base')
@section('content')
    <div class=" d-flex justify-content-center mt-5">
        <form action="{{ route('user.store') }}" method="post" class="bg-secondary-subtle p-5 rounded" style="width:30rem">
            @csrf
            <h5>Registrarse</h5>
            <div class="mb-3">
                <label for="" class="form-label">name</label>
                <input type="text" class="form-control" name="name" placeholder="Alejandra Orrego" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelpId"
                    placeholder="abc@mail.com" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="Password" />
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">
                    Registarse
                </button>
                <a href="{{ route('user.index') }}" class="">Log-in</a>
            </div>
        </form>
    </div>
@endsection
