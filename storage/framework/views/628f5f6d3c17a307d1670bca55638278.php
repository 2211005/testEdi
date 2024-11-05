

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Estadísticas de Visitas a la Página</h1>
    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3>Total de Tips</h3>
                    <p><?php echo e($totalTips); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3>Visitas Totales a la Página</h3>
                    <p><?php echo e($totalPageVisits); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3>Tips Visitados</h3>
                    <p><?php echo e($visitedTips); ?></p>
                </div>
            </div>
        </div>
    </div>

    <h2>Páginas más visitadas</h2>

    <div class="mb-3">
        <button id="barChartBtn" class="btn btn-primary">Barras</button>
        <button id="lineChartBtn" class="btn btn-secondary">Líneas</button>
        <button id="pieChartBtn" class="btn btn-success">Pastel</button>
    </div>

    <!-- Contenedor de la gráfica con tamaño fijo -->
    <div class="chart-container" style="position: relative; height: 1000px; width: 1200px;">
        <canvas id="visitsChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('visitsChart').getContext('2d');
    let chart;

    const data = {
        labels: <?php echo json_encode($mostVisitedPages->pluck('url'), 15, 512) ?>,
        datasets: [{
            label: 'Visitas',
            data: <?php echo json_encode($mostVisitedPages->pluck('views'), 15, 512) ?>,
            backgroundColor: ['rgba(54, 162, 235, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)'],
            borderWidth: 1
        }]
    };

    function createChart(type) {
        if (chart) chart.destroy();
        chart = new Chart(ctx, {
            type: type,
            data: data,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Default chart (bar)
    createChart('bar');

    // Change chart type on button click
    document.getElementById('barChartBtn').addEventListener('click', () => createChart('bar'));
    document.getElementById('lineChartBtn').addEventListener('click', () => createChart('line'));
    document.getElementById('pieChartBtn').addEventListener('click', () => createChart('pie'));
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PAGINA EDITION\prueba2\resources\views/admin/stats.blade.php ENDPATH**/ ?>