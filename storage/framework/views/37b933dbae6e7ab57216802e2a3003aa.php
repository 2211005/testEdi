

<?php $__env->startSection('content'); ?>

<!-- Botón para abrir la sidebar en pantallas pequeñas -->
<button class="menu-toggle btn btn-primary d-md-none" onclick="toggleMainSidebar()">☰</button> <!-- Botón de menú solo en pantallas pequeñas -->

<!-- Sidebar principal para pantallas grandes -->
<div class="main-sidebar">
    <!-- Botón de cerrar dentro de la sidebar solo para pantallas pequeñas -->
    <button class="close-btn" onclick="toggleMainSidebar()">✖</button>

    <div class="container mt-4">
        <h2>¿Tienes dudas o quejas?</h2>
        <p>Si tu duda no fue aclarada o no encuentras algún caso similar, puedes enviar un reporte en el siguiente formulario:</p>
        <a href="https://forms.office.com/pages/responsepage.aspx?id=ZDMD0sPeHEqXcj9BynxLdb1zGuwnHuZMt0egbcxZxD1UOFFMWkhOSUJKMjQxVlBVQ081Q1FNNUg0MC4u&web=1&wdLOR=c4AAEA831-3FF5-428F-84B9-73A9AAB648D2" target="_blank" class="btn btn-primary">Enviar reporte</a>
    </div>
    <div class="social-media-div mt-4">
        <ul class="social-icons">
            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-twitch"></span></a></li>
        </ul>
    </div>
</div>

<div class="container mt-4 main-content">
    <form action="<?php echo e(route('tips.search')); ?>" method="GET" class="d-flex mb-4">
        <input type="text" name="query" class="form-control me-2" placeholder="Buscar tips...">
        <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Buscar</button>
        <a href="<?php echo e(route('tips.index')); ?>" class="btn btn-secondary">Limpiar Búsqueda</a>
    </form>

    <h2 class="mb-4">Lista de tips</h2>
    <div class="cards-container">
        <?php $__currentLoopData = $tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('tips.show', $tip->id)); ?>" class="card-hover-container" style="text-decoration: none; color: inherit;">
            <div class="card-hover-content">
                <h3 class="titulo-tip"><?php echo e($tip->title); ?></h3>
                <p class="texto-tip"><?php echo e(Str::limit($tip->description, 100)); ?></p>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="latest-tips-container" id="latestTipsContainer">
    <div class="latest-tips" id="latestTipsContent">
        <h2>Últimos Tips Vistos</h2>
        <ul class="list-group">
            <?php $__currentLoopData = $latestViewedTips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $viewedTip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
                <a href="<?php echo e(route('tips.show', $viewedTip->id)); ?>"><?php echo e($viewedTip->title); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<button class="toggle-button" onclick="toggleLatestTips()">Últimos Tips</button>


<div class="mobile-sidebar">
    <div class="container mt-4">
        <h2>¿Tienes dudas o quejas?</h2>
        <p>Si tu duda no fue aclarada o no encuentras algún caso similar, puedes enviar un reporte en el siguiente formulario:</p>
        <a href="https://forms.office.com/pages/responsepage.aspx?id=ZDMD0sPeHEqXcj9BynxLdb1zGuwnHuZMt0egbcxZxD1UOFFMWkhOSUJKMjQxVlBVQ081Q1FNNUg0MC4u&web=1&wdLOR=c4AAEA831-3FF5-428F-84B9-73A9AAB648D2" target="_blank" class="btn btn-primary">Enviar reporte</a>
    </div>
    <div class="social-media-div mt-4">
        <ul class="social-icons">
            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
            <li><a href="#"><span class="fab fa-twitch"></span></a></li>
        </ul>
    </div>
</div>
<script>
    function toggleMainSidebar() {
    document.querySelector('.main-sidebar').classList.toggle('main-sidebar-open');
}
function toggleLatestTips() {
    const container = document.getElementById('latestTipsContainer');
    container.classList.toggle('open');
}



    function clearSearch() {
        document.querySelector('input[name="query"]').value = '';
        window.location.href = "<?php echo e(route('tips.index')); ?>";
    }

    document.getElementById('latest-tips').style.display = "none";

    function toggleTipPanel() {
        var latestTips = document.getElementById('latest-tips');
        latestTips.style.display = latestTips.style.display === "none" ? "block" : "none";
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PAGINA EDITION\prueba2\resources\views/tips/index.blade.php ENDPATH**/ ?>