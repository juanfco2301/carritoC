

<div class="container text-center">
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <?php echo link_to('/inicio', "Fco", $attributes = array('class' => 'navbar-brand main-title')); ?>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">sad</span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/inicio">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <?php if(Auth::user()->type=='admin'): ?>
      <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('users.index')); ?>">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('productos.index')); ?>">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('historial.index')); ?>">Historial</a>
      </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('store.index')); ?>">Store</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('cart.mostrar')); ?>">
                <button type="button" class="btn btn-default btn-sm">
                  <span class="glyphicon glyphicon-shopping-cart"></span> Cart
                </button>
        </a>
      </li>
      <li class="nav-item dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-user"></span>
        <?php echo e(Auth::user()->name); ?>

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <?php echo e(__('Finalizar sesión')); ?>

            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>

        </div>
      </li>

    </ul>
  </div>
</div>
</nav>
