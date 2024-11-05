@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>

    <div class="tip-details text-center">
        <h1>{{ $tip->title }}</h1>

        <!-- Mostrar la descripción debajo del título -->
        <p>{{ $tip->description }}</p>

        @if ($tip->document)
            <h3>Ver Documento</h3>
            <iframe src="{{ asset('storage/' . $tip->document) }}" style="width: 100%; height: 1000px;" frameborder="0"></iframe>
        @endif

        <div class="tip.content">
            {!! $tip->content !!}
        </div>
    </div>
</div>
@endsection
