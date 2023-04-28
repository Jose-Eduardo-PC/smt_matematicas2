@extends('layouts.admin_create')

<head>
    <title>Editar Recurso</title>
</head>
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('media_resources.update', $media_resource) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
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
