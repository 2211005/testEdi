

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Generar Reporte de Visitas</h1>

    <form action="<?php echo e(route('admin.reports')); ?>" method="GET">
        <label for="month">Mes:</label>
        <select name="month" id="month">
            <?php for($i = 1; $i <= 12; $i++): ?>
                <option value="<?php echo e($i); ?>"><?php echo e(date("F", mktime(0, 0, 0, $i, 10))); ?></option>
            <?php endfor; ?>
        </select>

        <label for="year">Año:</label>
        <select name="year" id="year">
            <?php for($i = now()->year; $i >= now()->year - 5; $i--): ?>
                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
            <?php endfor; ?>
        </select>

        <button type="submit" class="btn btn-primary">Generar Reporte</button>
    </form>
    
    <!-- Contenedor para mostrar el reporte si se genera -->
    <?php if(isset($reportData)): ?>
        <h2>Reporte de Visitas - <?php echo e($selectedMonth); ?>/<?php echo e($selectedYear); ?></h2>
        <canvas id="monthlyVisitsChart"></canvas>
        <!-- Agregar un botón para descargar el reporte como PDF -->
        <a href="<?php echo e(route('admin.reports.download', ['month' => $selectedMonth, 'year' => $selectedYear])); ?>" class="btn btn-secondary mt-3">Descargar PDF</a>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    <?php if(isset($reportData)): ?>
        const ctx = document.getElementById('monthlyVisitsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($reportData['days']); ?>,
                datasets: [{
                    label: 'Visitas Diarias',
                    data: <?php echo json_encode($reportData['views']); ?>,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            }
        });
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PAGINA EDITION\prueba2\resources\views/admin/reports.blade.php ENDPATH**/ ?>