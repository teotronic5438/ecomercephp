<?php
$current = basename($_SERVER['SCRIPT_NAME']);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $current == 'index.php' ? 'active' : '' ?>" href="/ecomerce/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'televisores.php' ? 'active' : '' ?>" href="/ecomerce/pages/televisores.php">Televisores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'celulares.php' ? 'active' : '' ?>" href="/ecomerce/pages/celulares.php">Celulares</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'aires.php' ? 'active' : '' ?>" href="/ecomerce/pages/aires.php">Aires</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'notebooks.php' ? 'active' : '' ?>" href="/ecomerce/pages/notebooks.php">Notebooks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'heladeras.php' ? 'active' : '' ?>" href="/ecomerce/pages/heladeras.php">Heladeras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'lavarropas.php' ? 'active' : '' ?>" href="/ecomerce/pages/lavarropas.php">Lavarropas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'contactenos.php' ? 'active' : '' ?>" href="/ecomerce/pages/contactenos.php">Contactenos</a>
        </li>
      </ul>
    </div>

  </div>
</nav>
