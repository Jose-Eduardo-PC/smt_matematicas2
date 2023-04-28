@extends('layouts.admin_create')
<title>Crear Ejemplo</title>
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center my-3">Crear Nuevo Recurso Multimedia</h3>
            <form method="POST" action="{{ route('media_resources.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.media_resources.partials._form')
                <br>
                <div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/translations/es.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                language: 'es'
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function previewFile() {
            const preview = document.querySelector('#preview');
            const file = document.querySelector('input[name=image_ejm]').files[0];
            const reader = new FileReader();
            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection

@section('css')
    <style>
        .ck-editor__editable_inline {
            min-height: 150px;
        }

        #preview {
            display: block;
            margin: 0 auto;
        }
    </style>
@endsection
