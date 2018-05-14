<?php $__env->startSection('content'); ?>
<div class="container text-center">
<?php if(count($errors)>0 ): ?>

    <div class="alert alert-danger">
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php echo Form::open(['route'=>'productos.store','method'=>'POST','files'=>true]); ?>


  <div class="from-group">
    <?php echo Form::label('name','Nombre'); ?>

    <?php echo Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Productos','required']); ?>

  </div>
  <br><br>
  <div class="from-group">
    <?php echo Form::label('imagen','Imagen'); ?>

    <?php echo Form::file('imagen'); ?>

  </div>
  <br><br>
  <div class="from-group">
    <?php echo Form::label('descripcion','Descripcion'); ?>

    <?php echo Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'...']); ?>

  </div>
  <br><br>
  <div class="from-group">
    <?php echo Form::label('precio','Precio'); ?>

    <?php echo Form::text('precio',null,['class'=>'form-control','placeholder'=>'Precio Productos','required']); ?>

  </div>
  <br><br>
  <div class="from-group">
    <?php echo Form::submit('Registrar',['class'=>'btn btn-primary']); ?>

  </div>
</div>
<?php echo Form::close(); ?>


 <?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>