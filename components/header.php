<header class="d-flex justify-content-between align-items-center">
    <!-- Logo -->
    <div class="logo">
        <a href="/ecomerce/index.php"><i class="fa-solid fa-cubes">&nbsp;</i><span>ShopNexus</span></a>
    </div>

    <!-- Barra de búsqueda -->
    <div class="busqueda flex-grow-1 mx-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Busque un producto" aria-label="Search"/>
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>

    <!-- Sesión y carrito -->
    <div class="d-flex align-items-center">
        <div class="sesion mx-3">
            <?php if (isset($_SESSION['usuario_nombre'])): ?>
                <p class="m-0 reducirTexto">Hola, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?></p>
                <p class="m-0 reducirTexto">
                    <a href="/ecomerce/pages/cerrar_sesion.php">Cerrar Sesión</a>
                </p>
            <?php else: ?>
                <p class="m-0 reducirTexto">Hola, inicia sesión</p>
                <p class="m-0 reducirTexto">
                    <a href="/ecomerce/pages/login.php">Ingresa</a> | <a href="/ecomerce/pages/login.php">Registrate</a>
                </p>
            <?php endif; ?>
        </div>
        <div class="carritoLogo">
            <i class="fa-solid fa-cart-shopping"></i>
        </div>
    </div>
</header>
