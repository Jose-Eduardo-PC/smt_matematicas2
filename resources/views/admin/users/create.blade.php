@extends('layouts.admin_create')

<head>
    <title>Crear nuevo usuario</title>
</head>

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center my-3">Registrar usuario</h3>
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.users.partials._form')
                <br><br>
                <div>
                    <a class="btn btn-secondary" href="{{ route('login') }}">Ya registrado?</a>
                    <button class="vrd btn btn-success" type="submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .imgPr {
            border-radius: 25px;
            box-shadow: 10px 10px 5px grey;
        }
    </style>
@endsection

@section('js')
    <script>
        function previewFile() {
            const preview = document.querySelector('#preview');
            const file = document.querySelector('input[type=file]').files[0];
            const reader = new FileReader();

            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function triggerFileInput() {
            document.getElementById('avatar').click();
        }
    </script>
@endsection
