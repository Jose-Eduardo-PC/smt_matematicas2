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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            adjustInputField();

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
                } else if ($('#resource_type').val() == 'pdf' || $('#resource_type').val() == 'imagen') {
                    $('#link_input').hide();
                    $('#file_input').show();
                    $('#file_label').show();
                    $('.input-group-text').hide();
                    $('#resource_icon').hide();
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

        #file_input {
            display: none;
        }

        #file_label {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
    </style>
@endsection
