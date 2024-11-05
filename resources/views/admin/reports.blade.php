@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Generar Reporte de Visitas</h1>

    <form action="{{ route('admin.reports') }}" method="GET">
        <label for="month">Mes:</label>
        <select name="month" id="month">
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}">{{ date("F", mktime(0, 0, 0, $i, 10)) }}</option>
            @endfor
        </select>

        <label for="year">Año:</label>
        <select name="year" id="year">
            @for ($i = now()->year; $i >= now()->year - 5; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>

        <button type="submit" class="btn btn-primary">Generar Reporte</button>
    </form>
    
    <!-- Contenedor para mostrar el reporte si se genera -->
    @if(isset($reportData))
        <h2>Reporte de Visitas - {{ $selectedMonth }}/{{ $selectedYear }}</h2>
        <canvas id="monthlyVisitsChart"></canvas>
        <!-- Agregar un botón para descargar el reporte como PDF -->
        <a href="{{ route('admin.reports.download', ['month' => $selectedMonth, 'year' => $selectedYear]) }}" class="btn btn-secondary mt-3">Descargar PDF</a>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    @if(isset($reportData))
        const ctx = document.getElementById('monthlyVisitsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($reportData['days']) !!},
                datasets: [{
                    label: 'Visitas Diarias',
                    data: {!! json_encode($reportData['views']) !!},
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            }
        });
    @endif
</script>
@endsection
