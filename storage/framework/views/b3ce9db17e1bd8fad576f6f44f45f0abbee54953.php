<?php $__env->startSection('content'); ?>


<div class="container text-center">

  <div class="product">
    <div class="jumbotron">
    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e($producto->name); ?></h3>
        <img src="\images\productos\<?php echo e($producto->imagen); ?>" width="100"> <br>
        <div class="product">
            <a href="<?php echo e(route('admin.store.detail',$producto->id)); ?>" class="btn btn-danger">Detalles</a>
              <a href="<?php echo e(route('admin.store.add',$producto->id,$producto->cantidad)); ?>" class="btn btn-warning">Agregar a Carrito</a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


  </div>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>