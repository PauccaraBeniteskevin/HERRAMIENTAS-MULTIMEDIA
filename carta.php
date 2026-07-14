<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Carta | La Metalúrgica</title>
    <!-- CSS externo unificado -->
    <link rel="stylesheet" href="./css/index2.css">
    <!-- Dependencias -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a61f393dda.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: #fbe1d3;">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#4a3b35;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index2.html">
            <img src="./img/logo.png" width="70" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-lg-auto text-end">
                <li class="nav-item"><a class="nav-link text-white px-3" href="./index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link text-white px-3 fw-bold" href="./carta.php">Carta</a></li>
                <li class="nav-item"><a class="nav-link text-white px-3" href="#footer">Nosotros</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Título -->
<div class="container text-center py-4">
    <h1 class="titulo-serif fst-italic display-3 mb-0" style="margin-top: 30px;">La Carta</h1>
</div>

<!-- Platos destacados -->
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center gap-3 mb-4">
            <h2 class="titulo-serif fst-italic mb-0">Nuestros Platos</h2>
            <div class="viga"></div>
        </div>
        <p class="text-muted mb-4">Seis piezas forjadas al fuego, cada una con su propio temple.</p>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Plato 1 -->
            <div class="col">
                <div class="menu-card">
                    <img src="./img/salchimixta.jpg" alt="Salchimixta" class="menu-img">
                    <span class="badge-cat">Clásica</span>
                    <h5 class="titulo-serif">Salchimixta</h5>
                    <p class="small text-muted">Hot dog, chorizo, papas fritas, ensalada.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="precio-pill">S/ 38</span>
                        <a href="pago.php?plato=Salchimixta" class="btn-pagar-plato">
                            <i class="bi bi-cart-check"></i> Pagar
                        </a>
                    </div>
                </div>
            </div>

            <!-- Plato 2 -->
            <div class="col">
                <div class="menu-card">
                    <img src="./img/chicharron.jpg" alt="Chicharrón familiar" class="menu-img">
                    <span class="badge-cat">Al horno</span>
                    <h5 class="titulo-serif">Chicharrón familiar</h5>
                    <p class="small text-muted">Chicharrón de cerdo clásico.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="precio-pill">S/ 68</span>
                        <a href="pago.php?plato=Chicharron-familiar" class="btn-pagar-plato">
                            <i class="bi bi-cart-check"></i> Pagar
                        </a>
                    </div>
                </div>
            </div>

            <!-- Plato 3 -->
            <div class="col">
                <div class="menu-card">
                    <img src="./img/acevichada.jpg" alt="Acevichada" class="menu-img">
                    <span class="badge-cat">Alitas</span>
                    <h5 class="titulo-serif">Acevichada</h5>
                    <p class="small text-muted">Con papas.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="precio-pill">S/ 72</span>
                        <a href="pago.php?plato=Alita-acevichada" class="btn-pagar-plato">
                            <i class="bi bi-cart-check"></i> Pagar
                        </a>
                    </div>
                </div>
            </div>

            <!-- Plato 4 -->
            <div class="col">
                <div class="menu-card">
                    <img src="./img/pizza.jpg" alt="Pizza La Metalúrgica" class="menu-img">
                    <span class="badge-cat">Horno de Leña</span>
                    <h5 class="titulo-serif">Pizza La Metalúrgica</h5>
                    <p class="small text-muted">Masa madre, chorizo artesanal, provolone y rúcula.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="precio-pill">S/ 42</span>
                        <a href="pago.php?plato=pizza-la-metalurgica" class="btn-pagar-plato">
                            <i class="bi bi-cart-check"></i> Pagar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-white py-5" style="background-color:#4a3b35;" id="footer">
    <div class="container-fluid px-3 px-lg-5">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-lg-between gap-4">
            <div class="d-flex align-items-center">
                <img src="./img/logo.png" width="110" class="me-3" alt="Logo">
                <div>
                    <h3 class="fw-bold mb-0">LA METALÚRGICA</h3>
                    <p class="mb-0">Donde el fuego forja el sabor.</p>
                </div>
            </div>
            <div>
                <h5 class="fw-bold">Horario</h5>
                <p class="mb-1">Mar - Sáb: 7:30 - 17:00</p>
                <p class="mb-1">Dom: 7:30 - 21:00</p>
                <p class="mb-3">Lun: Cerrado</p>
                <p class="mb-0"><i class="bi bi-telephone-fill"></i> +51 123 456 789</p>
            </div>
            <div>
                <div class="d-flex align-items-center gap-3 mb-3">
                    <h5 class="fw-bold mb-0">Contáctanos</h5>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
                    <a href="https://pe.linkedin.com/" target="_blank"><i class="fa-brands fa-square-linkedin"></i></a>
                    <a href="https://x.com/?lang=es" target="_blank"><i class="fa-brands fa-square-x-twitter"></i></a>
                    <a href="https://www.tiktok.com/es-419/" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://www.facebook.com/?locale=es_LA" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                </div>
                <h5 class="fw-bold">Dirección:</h5>
                <p class="mb-0">Av. Los Jardines Oeste 177,</p>
                <p class="mb-0">Lima 15419 - San Juan de Lurigancho</p>
            </div>
        </div>
    </div>
    <hr class="border-light my-4 mx-0" style="width:100%; opacity:0.3;">
    <div class="container-fluid px-3 px-lg-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between">
            <p class="mb-0">&copy; 2026 La Metalúrgica. Todos los derechos reservados.</p>
            <p class="mb-0">Sitio desarrollado por: Banzer Irene - Pauccara Benites.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>