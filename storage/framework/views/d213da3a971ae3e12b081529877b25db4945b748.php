<?php $__env->startSection('content'); ?>
<div class="container text-center">
  <div class="jumbotron">
    <!--Buscador
    <?php echo Form::open(['route' => 'productos.index','method'=>'GET','class'=>'navbar-form pull-right']); ?>

        <div class="from-group">
            <?php echo Form::text('name',null,['class'=>'form-control','placeholder'=>'buscar producto...']); ?>

            <span class="input-group-addon" id="search"><span class="glyphicon gluphicon-search" aria-hidden="true"></span></span>
        </div>
    <?php echo Form::close(); ?>

    Fin Buscador-->
    <br><br>
    <br><br>
    <table class="table table-striped">
      <h2>Detalles de las compras realizadas con exito</h2><br><br>
      <thead>
        <th>Comprador</th>
        <th>Productos</th>
        <th>Precio</th>
        <th>cantidades</th>
        <th>Fecha que se realizo la compra</th>
      </thead>
      <tbody>
        <?php $__currentLoopData = $orders_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($item->order->user->name); ?></td>
          <td><?php echo e($item->producto->name); ?></td>
          <td><?php echo e($item->precio); ?></td>
          <td><?php echo e($item->cantidad); ?></td>
          <td><?php echo e($item->order->created_at); ?></td>
        </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
<?php echo $orders_items -> render(); ?>

</div>
</div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>