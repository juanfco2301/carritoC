<?php $__env->startSection('content'); ?>
<div class="container text-center">
    <div class="product">
        <h3><?php echo e($productos['name']); ?></h3>
        <img src="\images\productos\<?php echo e($productos['imagen']); ?>" width="100"> <br>
        <div class="product">
            <?php echo e($productos['descripcion']); ?><br><br>
            <p>Precio: $<?php echo e(number_format($productos['precio'])); ?>  USD<br></p>
              <a href="<?php echo e(route('admin.store.add',$productos['id'])); ?>" class="btn btn-warning">agregar a carrito de compra</a>
              <a href="<?php echo e(route('store.index')); ?>" class="btn btn-warning">volver</a>
        </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>