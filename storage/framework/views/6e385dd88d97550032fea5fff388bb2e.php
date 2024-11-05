

<?php $__env->startSection('content'); ?>
<div class="container">
    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary">Volver</a>

    <div class="tip-details text-center">
        <h1><?php echo e($tip->title); ?></h1>

        <!-- Mostrar la descripción debajo del título -->
        <p><?php echo e($tip->description); ?></p>

        <?php if($tip->document): ?>
            <h3>Ver Documento</h3>
            <iframe src="<?php echo e(asset('storage/' . $tip->document)); ?>" style="width: 100%; height: 1000px;" frameborder="0"></iframe>
        <?php endif; ?>

        <div class="tip.content">
            <?php echo $tip->content; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PAGINA EDITION\prueba2\resources\views/tips/show.blade.php ENDPATH**/ ?>