<body>

    <header class="header" id="header">
        <nav class="nav container">
            <a class="logo logo__blanco" href="/" title="Senati">
                <img src="imagenes\img\BioLogo.svg" alt="Senati" class="logo">
                <style>
                    /* Aplica estilos a la imagen con la clase "logo" */
                    .logo {
                        width: 35%;
                        /* Define el ancho deseado en píxeles o cualquier otra unidad de medida */
                        /* Puedes ajustar este valor según tus necesidades */
                    }
                </style>
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">INICIO</a>
                    </li>
                    <li class="nav__item">
                        <a href="#featured" class="nav__link">PERFIL</a>
                    </li>
                    <li class="nav__item">
                        <a href="#products" class="nav__link">PRODUCTO</a>
                    </li>
                    <li class="nav__item">
                        <a href="#new" class="nav__link">NOSOTROS</a>
                    </li>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>
            </div>

            <div class="nav__btns">
                <!-- Boton de modo oscuro, no se usa pero dxxdxdd -->
                <!-- <i class='bx bx-moon change-theme' id="theme-button"></i> -->
                <li class="nav-item dropdown">
                    <label class="nav-link" for="navbarDropdown">
                        <i class="bi bi-person"></i>
                    </label>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="loginregis.php">Iniciar sesión/Registrarte</a></li>
                        <li><a class="dropdown-item" href="perfilUser.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="usuarios/mis_pedidos.php">HISTORIAL</a></li>
                        <li><a class="dropdown-item" href="panelAdmin.php">ADMIN</a></li>
                        <li><a class="dropdown-item" href="salir.php">CERRAR SESION</a></li>
                    </ul>

                </li>
                <!-- Theme change button -->
                <div class="nav__shop" id="cart-shop">
                    <i class='bx bx-cart'></i>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </div>
        </nav>
    </header>

    <!--==================== CART ====================-->
    <div class="cart" id="cart">
        <i class='bx bx-x cart__close' id="cart-close"></i>

        <h2 class="cart__title-center">Mi carrito</h2>

        <div class="cart__container">
            <article class="cart__card">
                <div class="cart__box">
                    <img src="assets/img/featured1.png" alt="" class="cart__img">
                </div>

                <div class="cart__details">
                    <h3 class="cart__title">Aca va los productoss, xdxd. </h3>
                    <span class="cart__price">$1050 prezio</span>

                    <div class="cart__amount">
                        <div class="cart__amount-content">
                            <span class="cart__amount-box">
                                <i class='bx bx-minus'></i>
                            </span>

                            <span class="cart__amount-number">1</span>

                            <span class="cart__amount-box">
                                <i class='bx bx-plus'></i>
                            </span>
                        </div>

                        <i class='bx bx-trash-alt cart__amount-trash'></i>
                    </div>
                </div>
            </article>

            <article class="cart__card">
                <div class="cart__box">
                    <img src="assets/img/featured3.png" alt="" class="cart__img">
                </div>

                <div class="cart__details">
                    <h3 class="cart__title">maicito</h3>
                    <span class="cart__price">$850 prezio</span>

                    <div class="cart__amount">
                        <div class="cart__amount-content">
                            <span class="cart__amount-box">
                                <i class='bx bx-minus'></i>
                            </span>

                            <span class="cart__amount-number">1</span>

                            <span class="cart__amount-box">
                                <i class='bx bx-plus'></i>
                            </span>
                        </div>

                        <i class='bx bx-trash-alt cart__amount-trash'></i>
                    </div>
                </div>
            </article>

            <article class="cart__card">
                <div class="cart__box">
                    <img src="assets/img/new1.png" alt="" class="cart__img">
                </div>

                <div class="cart__details">
                    <h3 class="cart__title">maizote</h3>
                    <span class="cart__price">$980 prezio</span>

                    <div class="cart__amount">
                        <div class="cart__amount-content">
                            <span class="cart__amount-box">
                                <i class='bx bx-minus'></i>
                            </span>

                            <span class="cart__amount-number">1</span>

                            <span class="cart__amount-box">
                                <i class='bx bx-plus'></i>
                            </span>
                        </div>

                        <i class='bx bx-trash-alt cart__amount-trash'></i>
                    </div>
                </div>
            </article>
        </div>

        <div class="cart__prices">
            <span class="cart__prices-item">la cantidad de items, xdxd</span>
            <span class="cart__prices-total">$2880 total prezio</span>
        </div>
    </div>
</body>