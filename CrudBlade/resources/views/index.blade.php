@extends('layout.base')

@section('content')
    {{-- login --}}
    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif

    @if (Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif

    <script>
        var alertList = document.querySelectorAll(".alert");
        alertList.forEach(function(alert) {
            new bootstrap.Alert(alert);
        });
    </script>

    <div class=" d-flex justify-content-center mt-5">
        <form action="{{ route('user.login') }}" method="post" class="bg-secondary-subtle p-5 rounded" style="width:30rem">
            @csrf
            <h5>Inicio de sesión</h5>
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
                    Log-in
                </button>
                <a href="{{ route('user.register') }}" class="">Registrate</a>
            </div>

        </form>
    </div>
@endsection
