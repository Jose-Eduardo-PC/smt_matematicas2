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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            adjustInputField();

            @if (isset($media_resource))
                $('#link_input').val('{{ $media_resource->link_video }}');
                var fileName = '{{ $media_resource->link_video }}'.split('/').pop();
                $('#file_name').text(fileName);
            @endif

            $('#resource_type').change(function() {
                adjustInputField();
            });

            function adjustInputField() {
                if ($('#resource_type').val() == 'default') {
                    $('#link_input').hide();
                    $('#file_input').hide();
                    $('#file_label').hide();
                    $('.input-group-text').hide();
                    $('#resource_icon').show();
                } else if ($('#resource_type').val() == 'video') {
                    $('#link_input').show();
                    $('#file_input').hide();
                    $('#file_label').hide();
                    $('.input-group-text').show();
                    $('#resource_icon').hide();
                } else if ($('#resource_type').val() == 'pdf') {
                    $('#link_input').hide();
                    $('#file_input').show();
                    $('#file_label').show();
                    $('.input-group-text').hide();
                    $('#resource_icon').hide();
                    // Aquí puedes agregar código específico para manejar PDFs
                } else if ($('#resource_type').val() == 'imagen') {
                    $('#link_input').hide();
                    $('#file_input').show();
                    $('#file_label').show();
                    $('.input-group-text').hide();
                    $('#resource_icon').hide();
                    // Aquí puedes agregar código específico para manejar imágenes
                }
            }
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
