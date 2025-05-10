<!-- <header>
    <div class="logo">LOGO</div>
    <div class="busqueda">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Busque un producto" aria-label="Search"/>
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>
    <div class="sesion">
        <p class="m-0">Hola, inicia sesion</p>
        <p class="m-0"><a>Ingresa</a> | Registrate</p> 
    </div>
    <div class="carritoLogo">
        <i class="fa-solid fa-cart-shopping"></i>
    </div>
</header> -->

<header class="d-flex justify-content-between align-items-center">
    <!-- Logo -->
    <div class="logo">
        <i class="fa-solid fa-cubes">&nbsp;</i><span>ShopNexus</span>
    </div>

    <!-- Barra de búsqueda (ocupa el mayor espacio posible) -->
    <div class="busqueda flex-grow-1 mx-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Busque un producto" aria-label="Search"/>
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>

    <!-- Sección de sesión y carrito (alineados a la derecha) -->
    <div class="d-flex align-items-center">
        <div class="sesion mx-3">
            <p class="m-0 reducirTexto">Hola, inicia sesión</p>
            <p class="m-0 reducirTexto"><a href="#">Ingresa</a> | <a href="#">Registrate</a></p>
        </div>
        <div class="carritoLogo">
            <i class="fa-solid fa-cart-shopping"></i>
        </div>
    </div>
</header>
