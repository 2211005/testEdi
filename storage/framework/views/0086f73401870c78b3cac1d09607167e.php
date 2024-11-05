

<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <h1 class="text-center">Lista de Tips</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Button to create a new tip -->
        <div class="mb-4 text-center">
            <a href="<?php echo e(route('admin.create')); ?>" class="btn btn-success">Crear Tip</a>
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
                    <?php $__currentLoopData = $tips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($tip->id); ?></td>
                            <td><?php echo e($tip->title); ?></td>
                            <td><?php echo e($tip->description); ?></td>
                            <td class="d-flex justify-content-center">
                                <!-- Buttons for editing and deleting with spacing -->
                                <a href="<?php echo e(route('admin.edit', $tip->id)); ?>" class="btn btn-primary mx-2">Editar</a>
                                <form action="<?php echo e(route('admin.destroy', $tip->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger mx-2">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PAGINA EDITION\prueba2\resources\views/admin/index.blade.php ENDPATH**/ ?>