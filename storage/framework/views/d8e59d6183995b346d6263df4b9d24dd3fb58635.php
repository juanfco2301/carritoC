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
<?php echo Form::open(['route'=>'users.store','method'=> 'POST']); ?>


  <div class="from-group">
    <?php echo Form::label('name','Nombre'); ?>

    <?php echo Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombres','required']); ?>

  </div>
  <div class="from-group">
    <?php echo Form::label('email','Correo Electronico'); ?>

    <?php echo Form::email('email',null,['class'=>'form-control','placeholder'=>'Correo','required']); ?>

  </div>

  <div class="from-group">
    <?php echo Form::label('password','Contraseña'); ?>

    <?php echo Form::password('password',['class'=>'form-control','placeholder'=>'*************','required']); ?>

  </div>
  <div class="from-group">
    <?php echo Form::label('type','Tipo'); ?>

    <?php echo Form::select('type',[''=>'Seleccione Nivel...','member'=>'Miembro','admin'=>'Administrador']); ?>

  </div>
  <div class="from-group">
    <?php echo Form::submit('Registrar',['class'=>'btn btn-primary']); ?>

  </div>
    </div>
<?php echo Form::close(); ?>


 <?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>