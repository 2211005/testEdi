@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tip</title>
    <!-- Froala CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.6/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.6/js/froala_editor.pkgd.min.js"></script>
</head>

<div class="container my-5">
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>

    <h1 class="text-center">Crear un Nuevo Tip</h1>

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="document" class="form-label">Subir Documento:</label>
            <input type="file" name="document" class="form-control" accept=".pdf,.doc,.docx,.xlsx,.ppt,.pptx,.txt">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenido del Tip:</label>
            <textarea name="content" id="froala-editor"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<!-- Inicializar Froala -->
<script>
    new FroalaEditor('#froala-editor', {
        height: 500 // Cambia 300 por el tamaño en píxeles que desees
    });
</script>

@endsection
