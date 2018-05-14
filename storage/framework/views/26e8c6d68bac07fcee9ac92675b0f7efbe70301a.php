<?php $__env->startSection('content'); ?>
<div class="container text-center">
  <div class="jumbotron">
    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-info">Registrar Usuario</a>
    <table class="table table-striped">
      <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Correo</th>
        <th>Acción</th>
      </thead>
      <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($user->id); ?></td>
          <td><?php echo e($user->name); ?></td>
          <td><?php echo e($user->email); ?></td>
          <td><?php echo e($user->type); ?></td>
          <td><a href="<?php echo e(route('admin.users.destroy',$user->id)); ?>" onclick="return confirm('esta seguro que desea eliminarlo?')" class="btn btn-danger"></a>
            <a href="<?php echo e(route('users.edit',$user->id)); ?>" class="btn btn-warning"></a></td>
        </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
<?php echo $users -> render(); ?>

  </div>
</div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>