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
<?php echo Form::open(['route'=>['productos.update',$productos],'method'=>'PUT','files'=>true]); ?>


  <div class="from-group">
    <?php echo Form::label('name','Nombre'); ?>

    <?php echo Form::text('name',$productos->name,['class'=>'form-control','placeholder'=>'Nombre Productos','required']); ?>

  </div>
  <br><br>
  <div class="from-group">
    <?php echo Form::label('imagen','Imagen'); ?>

    <?php echo Form::file('imagen'); ?>

  </div>
  <br><br>
  <div class="from-group">
    <?php echo Form::label('descripcion','Descripcion'); ?>

    <?php echo Form::textarea('descripcion',$productos->descripcion,['class'=>'form-control','placeholder'=>'...']); ?>

  </div>
  <br><br>
  <div class="from-group">
    <?php echo Form::label('precio','Precio'); ?>

    <?php echo Form::text('precio',$productos->precio,['class'=>'form-control','placeholder'=>'Precio Productos','required']); ?>

  </div>
  <br><br>
  <div class="from-group">
    <?php echo Form::submit('modificar',['class'=>'btn btn-primary']); ?>

  </div>

<?php echo Form::close(); ?>

</div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>