@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <!-- Menú lateral -->
    <button class="menu-toggle-dashboard" onclick="toggleDashboardSidebar()">☰</button>
    <div class="sidebar dashboard-sidebar">
        

        <h2>Dashboard</h2>
        <ul>
            <li><a href="{{ route('admin.index') }}">Lista de Tips</a></li>
            <li><a href="{{ route('admin.create') }}">Crear Nuevo Tip</a></li>
            <li><a href="{{ route('admin.stats') }}">Estadísticas</a></li>
            <li><a href="{{ route('admin.filters') }}">Filtrar Tips</a></li>
            <li><a href="{{ route('admin.reports') }}">Generar Reportes</a></li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <h1>Bienvenido al Dashboard</h1>
        <div class="dashboard-cards">
            <a href="{{ route('admin.index') }}" class="card card-button">
                <i class="fas fa-list"></i>
                <h3>Lista de Tips</h3>
                <p>Gestiona y visualiza todos los tips disponibles.</p>
            </a>
            <a href="{{ route('admin.create') }}" class="card card-button">
                <i class="fas fa-plus-circle"></i>
                <h3>Crear Nuevo Tip</h3>
                <p>Añade un nuevo tip al sistema.</p>
            </a>
            <a href="{{ route('admin.stats') }}" class="card card-button">
                <i class="fas fa-chart-line"></i>
                <h3>Estadísticas</h3>
                <p>Visualiza las estadísticas de uso.</p>
            </a>
            <a href="{{ route('admin.filters') }}" class="card card-button">
                <i class="fas fa-filter"></i>
                <h3>Filtrar Tips</h3>
                <p>Busca y filtra tips por diferentes criterios.</p>
            </a>
            <a href="{{ route('admin.reports') }}" class="card card-button">
                <i class="fas fa-file-alt"></i>
                <h3>Generar Reportes</h3>
                <p>Genera reportes detallados.</p>
            </a>
        </div>
    </div>
</div>
<script>

function toggleDashboardSidebar() {
    document.querySelector('.dashboard-sidebar').classList.toggle('dashboard-sidebar-open');
}

</script>
@endsection
