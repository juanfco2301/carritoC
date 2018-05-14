<?php $__env->startSection('content'); ?>
<div class="container text-center">
  <div class="jumbotron">
    <a href="<?php echo e(route('productos.create')); ?>" class="btn btn-info">Registrar productos</a>
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
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Acción</th>
      </thead>
      <tbody>
        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
          <td><?php echo e($producto->id); ?></td>
          <td><?php echo e($producto->name); ?></td>
          <td><?php echo e($producto->imagen); ?></td>
          <td><?php echo e($producto->descripcion); ?></td>
          <td><?php echo e($producto->precio); ?></td>
          <td><a href="<?php echo e(route('admin.productos.destroy',$producto->id)); ?>" onclick="return confirm('esta seguro que desea eliminarlo?')" class="btn btn-danger"></a>
            <a href="<?php echo e(route('productos.edit',$producto->id)); ?>" class="btn btn-warning"></a></td>
        </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
<?php echo $productos -> render(); ?>

</div>
</div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>