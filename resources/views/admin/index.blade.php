@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-center">Lista de Tips</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Button to create a new tip -->
        <div class="mb-4 text-center">
            <a href="{{ route('admin.create') }}" class="btn btn-success">Crear Tip</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tips as $tip)
                        <tr>
                            <td>{{ $tip->id }}</td>
                            <td>{{ $tip->title }}</td>
                            <td>{{ $tip->description }}</td>
                            <td class="d-flex justify-content-center">
                                <!-- Buttons for editing and deleting with spacing -->
                                <a href="{{ route('admin.edit', $tip->id) }}" class="btn btn-primary mx-2">Editar</a>
                                <form action="{{ route('admin.destroy', $tip->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-2">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
