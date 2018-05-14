<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>My Laravel - Dashboard</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster+Two' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo e(asset('plugins/Bootstrap/css/bootstrap.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('admin/css/main.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
</head>
<body>

	<?php if(\Session::has('message')): ?>
		<?php echo $__env->make('Admin.template.partials.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endif; ?>
	<?php echo $__env->make('Admin.template.partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->yieldContent('content'); ?>

	<?php echo $__env->make('Admin.template.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="<?php echo e(asset('plugins/jquery/js/jquery-3.3.1.js')); ?>"></script>
	<script src="<?php echo e(asset('plugins/Bootstrap/js/bootstrap.js')); ?>"></script>
	<script src="<?php echo e(asset('js/main.js')); ?>"></script>
</body>
</html>
