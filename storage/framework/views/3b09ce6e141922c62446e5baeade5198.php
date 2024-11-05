

<?php $__env->startSection('content'); ?>
<div class="dashboard-container">
    <!-- Menú lateral -->
    <button class="menu-toggle-dashboard" onclick="toggleDashboardSidebar()">☰</button>
    <div class="sidebar dashboard-sidebar">
        

        <h2>Dashboard</h2>
        <ul>
            <li><a href="<?php echo e(route('admin.index')); ?>">Lista de Tips</a></li>
            <li><a href="<?php echo e(route('admin.create')); ?>">Crear Nuevo Tip</a></li>
            <li><a href="<?php echo e(route('admin.stats')); ?>">Estadísticas</a></li>
            <li><a href="<?php echo e(route('admin.filters')); ?>">Filtrar Tips</a></li>
            <li><a href="<?php echo e(route('admin.reports')); ?>">Generar Reportes</a></li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <h1>Bienvenido al Dashboard</h1>
        <div class="dashboard-cards">
            <a href="<?php echo e(route('admin.index')); ?>" class="card card-button">
                <i class="fas fa-list"></i>
                <h3>Lista de Tips</h3>
                <p>Gestiona y visualiza todos los tips disponibles.</p>
            </a>
            <a href="<?php echo e(route('admin.create')); ?>" class="card card-button">
                <i class="fas fa-plus-circle"></i>
                <h3>Crear Nuevo Tip</h3>
                <p>Añade un nuevo tip al sistema.</p>
            </a>
            <a href="<?php echo e(route('admin.stats')); ?>" class="card card-button">
                <i class="fas fa-chart-line"></i>
                <h3>Estadísticas</h3>
                <p>Visualiza las estadísticas de uso.</p>
            </a>
            <a href="<?php echo e(route('admin.filters')); ?>" class="card card-button">
                <i class="fas fa-filter"></i>
                <h3>Filtrar Tips</h3>
                <p>Busca y filtra tips por diferentes criterios.</p>
            </a>
            <a href="<?php echo e(route('admin.reports')); ?>" class="card card-button">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PAGINA EDITION\prueba2\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>