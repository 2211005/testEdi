

<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <h1 class="text-center">Filtrar y Gestionar Tips</h1>

        <!-- Filtros -->
        <form action="<?php echo e(route('admin.filters')); ?>" method="GET" class="mb-4">
            <div class="row">
                <!-- Buscar por título o descripción -->
                <div class="col-md-4">
                    <label for="search">Buscar por título o descripción</label>
                    <input type="text" name="search" class="form-control" placeholder="Buscar..." value="<?php echo e(request('search')); ?>">
                </div>

                <!-- Filtro por vistas -->
                <div class="col-md-4">
                    <label for="view_count">Ordenar por vistas</label>
                    <input type="checkbox" name="view_count" <?php echo e(request('view_count') ? 'checked' : ''); ?> onchange="toggleDateOrder(this)">
                    <select name="view_order" class="form-control">
                        <option value="asc" <?php echo e(request('view_order') == 'asc' ? 'selected' : ''); ?>>Ascendente</option>
                        <option value="desc" <?php echo e(request('view_order') == 'desc' ? 'selected' : ''); ?>>Descendente</option>
                    </select>
                </div>

                <!-- Filtro por fecha -->
                <div class="col-md-4">
                    <label for="date">Ordenar por fecha</label>
                    <input type="checkbox" name="date" <?php echo e(request('date') ? 'checked' : ''); ?> onchange="toggleViewOrder(this)">
                    <select name="date_order" class="form-control">
                        <option value="asc" <?php echo e(request('date_order') == 'asc' ? 'selected' : ''); ?>>Ascendente</option>
                        <option value="desc" <?php echo e(request('date_order') == 'desc' ? 'selected' : ''); ?>>Descendente</option>
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
                    <?php $__currentLoopData = $filteredTips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($tip->id); ?></td>
                            <td><?php echo e($tip->title); ?></td>
                            <td><?php echo e($tip->description); ?></td>
                            <td><?php echo e($tip->created_at->format('d/m/Y')); ?></td>
                            <td><?php echo e($tip->views); ?></td>
                            <td class="d-flex justify-content-center">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PAGINA EDITION\prueba2\resources\views/admin/filters.blade.php ENDPATH**/ ?>