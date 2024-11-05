@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-center">Filtrar y Gestionar Tips</h1>

        <!-- Filtros -->
        <form action="{{ route('admin.filters') }}" method="GET" class="mb-4">
            <div class="row">
                <!-- Buscar por título o descripción -->
                <div class="col-md-4">
                    <label for="search">Buscar por título o descripción</label>
                    <input type="text" name="search" class="form-control" placeholder="Buscar..." value="{{ request('search') }}">
                </div>

                <!-- Filtro por vistas -->
                <div class="col-md-4">
                    <label for="view_count">Ordenar por vistas</label>
                    <input type="checkbox" name="view_count" {{ request('view_count') ? 'checked' : '' }} onchange="toggleDateOrder(this)">
                    <select name="view_order" class="form-control">
                        <option value="asc" {{ request('view_order') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                        <option value="desc" {{ request('view_order') == 'desc' ? 'selected' : '' }}>Descendente</option>
                    </select>
                </div>

                <!-- Filtro por fecha -->
                <div class="col-md-4">
                    <label for="date">Ordenar por fecha</label>
                    <input type="checkbox" name="date" {{ request('date') ? 'checked' : '' }} onchange="toggleViewOrder(this)">
                    <select name="date_order" class="form-control">
                        <option value="asc" {{ request('date_order') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                        <option value="desc" {{ request('date_order') == 'desc' ? 'selected' : '' }}>Descendente</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>

        <!-- Tabla de resultados -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha de creación</th>
                        <th>Vistas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($filteredTips as $tip)
                        <tr>
                            <td>{{ $tip->id }}</td>
                            <td>{{ $tip->title }}</td>
                            <td>{{ $tip->description }}</td>
                            <td>{{ $tip->created_at->format('d/m/Y') }}</td>
                            <td>{{ $tip->views }}</td>
                            <td class="d-flex justify-content-center">
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

    <script>
        function toggleDateOrder(viewCountCheckbox) {
            if (viewCountCheckbox.checked) {
                document.querySelector('input[name="date"]').checked = false;
            }
        }

        function toggleViewOrder(dateCheckbox) {
            if (dateCheckbox.checked) {
                document.querySelector('input[name="view_count"]').checked = false;
            }
        }
    </script>
@endsection
