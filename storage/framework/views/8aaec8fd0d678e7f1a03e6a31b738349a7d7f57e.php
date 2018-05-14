<?php $__env->startSection('content'); ?>
<div class="container text-center">
  <div class="page-header">
      <h1>carrito de compras</h1>
  </div>
  <table class="table table-striped">



    <a href="<?php echo e(route('cart.eliminartodos')); ?>" class="badge badge-primary">Limpiar Carrito De Compras</a><br><br>
    <thead>
      <th>Imagen</th>
      <th>Producto</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>Subtotal</th>
      <th>Quitar</th>
    </thead>
    <?php if(isset($cart)): ?>
        <?php if(count($cart)): ?>
            <tbody>


              <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                      <td><img src="\images\productos\<?php echo e($car->imagen); ?>" width="100" class="rounded-circle"></td>
                      <td><?php echo e($car->name); ?></td>
                      <td>$<?php echo e(number_format($car->precio)); ?></td>
                      <td><?php echo e($car->cantidad); ?></td>

                      <td>$<?php echo e(number_format(($car->cantidad)*($car->precio))); ?>

                      </td>
                      <td>


                        <a href="<?php echo e(route('cart.eliminar',$car->id)); ?>" class="badge badge-danger">X</a>
                      </td>
                    </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <h4><span class="label.label-warning">Total:
            <?php
            $total=0;
            ?>
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
              $total=(($c->precio)*($c->cantidad))+$total;
              ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            $<?php echo e(number_format($total)); ?>

          </h4>

          <a href="<?php echo e(route('store.index')); ?>" class="badge badge-danger">Volver</a>
          <a href="<?php echo e(route('cart.compra')); ?>" class="badge badge-primary">Siguiente</a><br><br>
        <?php else: ?>
        <h4><span class="label.label-warning">No hay Productos</h4>
        <?php endif; ?>
    <?php else: ?>
    <h4><span class="label.label-warning">No hay Productos</h4>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>