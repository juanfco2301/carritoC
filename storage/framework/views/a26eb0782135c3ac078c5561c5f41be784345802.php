<?php $__env->startSection('content'); ?>

<div class="container text-center">
  <div class="jumbotron">
<h1 class="display-4">Hola, Bienvenido!</h1>
<p class="lead">Pagina Para vender productos</p>
<hr class="my-4">
<p>En Dolares</p> 
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.template.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>