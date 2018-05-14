<?php $__env->startSection('content'); ?>
    <div class="container text-center">
      <div class="page-header">
          <h1>Detalles de la compra</h1>
      </div>
    <h2>  Datos del usuario</h2><br>
    <table class="table table-striped">
      <thead>
        <th>Usuario</th>
        <th>Email</th>
      </thead>
              <tbody>
                <tr>
                  <td><?php echo e(Auth::user()->name); ?></td>
                  <td><?php echo e(Auth::user()->email); ?></td>
                </tr>
              </tbody>
    </table>
    <h2>Datos de la compra</h2><br>
      <?php $total=0; ?>
      <table class="table table-striped">
        <thead>
          <th>Nombre</th>
          <th>Precio</th>
        </thead>
      <tbody>
        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($car->name); ?></td>
              <td>$<?php echo e(number_format($car->precio)); ?></td>
            </tr>
        <?php $total=(($car->precio)*($car->cantidad))+$total; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
      </table>

      <br>
      <br><br>
      <h4>total:</h4>
      $<?php echo e(number_format($total)); ?><br><br>
      <a href="<?php echo e(route('cart.mostrar')); ?>" class="badge badge-primary">Atras</a>
      <a href="<?php echo e(route('payment')); ?>" class="badge badge-primary">Realizar La Compra</a><br><br>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>