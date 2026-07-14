<?php
require("conecta.php");

$mensaje = '';
$pedido_guardado = false;
$platoSeleccionado = $_GET['plato'] ?? '';
/* Se obtienen los datos del pedido y se guarda en la bd cuando el pago es exitoso */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroMesa = $_POST['numero_mesa'] ?? '';
    $cliente    = $_POST['cliente'] ?? '';
    $plato      = $_POST['plato'] ?? '';
    $horaActual = date('H:i:s');

    if ($numeroMesa && $cliente && $plato) {
        $sql = "INSERT INTO pedidos_kds (numero_mesa, cliente, plato, hora_pedido) 
                VALUES ('$numeroMesa', '$cliente', '$plato', '$horaActual')";
        /* Mensaje de pago exitoso */
        if (mysqli_query($cone, $sql)) {
            $pedido_guardado = true;
            $mensaje = "✓ Pago confirmado. Tu pedido aparecerá en la pantalla al frente de la cocina";
        } else {
            $mensaje = "✗ Error: " . mysqli_error($cone);
        }
    } else {
        $mensaje = "✗ Faltan datos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar | La Metalúrgica</title>
    <link rel="stylesheet" href="./css/index2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a61f393dda.js" crossorigin="anonymous"></script>
     <style>
        body {
            background-color: rgba(255, 220, 200, 0.7);
        }
    </style>
    <style>
        
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark py-1" style="background-color:#4a3b35;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="./img/logo.png" width="50" alt="Logo La Metalúrgica">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-lg-auto text-end">
                <li class="nav-item"><a class="nav-link text-white px-3" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link text-white px-3" href="carta.php">Carta</a></li>
                <li class="nav-item"><a class="nav-link text-white px-3" href="#footer">Nosotros</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="py-5">
    <div class="container" style="max-width: 560px;">

        <div class="d-flex align-items-center gap-3 mb-4">
            <h2 class="titulo-serif fst-italic mb-0">Finalizar pago</h2>
        </div>

        <?php if ($mensaje): ?>
            <div class="exito">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <!-- Resumen del pedido -->
        <div class="pago-card p-4 mb-4">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Pedido</span>
                <span>#MTL-2481</span>
            </div>
            <div class="d-flex justify-content-between">
                <span class="fw-bold">Total a pagar</span>
                <span class="precio-total fs-4">S/ 96.00</span>
            </div>
        </div>

        <!-- Selección de método de pago -->
        <p class="fw-bold mb-2">Elige cómo quieres pagar</p>
        <div class="row row-cols-3 g-2 mb-4" id="metodos-pago">
            <div class="col metodo-opcion">
                <input type="radio" name="metodo" id="metodo-yape" value="yape" checked>
                <label class="metodo-label" for="metodo-yape">
                    <i class="bi bi-phone"></i>
                    <span class="small">Yape</span>
                </label>
            </div>
            <div class="col metodo-opcion">
                <input type="radio" name="metodo" id="metodo-tarjeta" value="tarjeta">
                <label class="metodo-label" for="metodo-tarjeta">
                    <i class="bi bi-credit-card"></i>
                    <span class="small">Tarjeta débito</span>
                </label>
            </div>
            <div class="col metodo-opcion">
                <input type="radio" name="metodo" id="metodo-efectivo" value="efectivo">
                <label class="metodo-label" for="metodo-efectivo">
                    <i class="bi bi-cash-coin"></i>
                    <span class="small">Efectivo</span>
                </label>
            </div>
        </div>

        <!-- Paneles de cada método -->
        <div id="panel-yape" class="pago-card p-4 mb-4 text-center">
            <p class="fw-bold mb-2">Escanea el código con tu app Yape</p>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=yape-simulado-MTL-2481"
                 alt="Código QR Yape" class="mb-3">
                 <!-- yape -->
            <p class="text-muted small mb-3">O ingresa tu número Yape para simular la aprobación</p>
            <input type="tel" class="form-control mb-3" placeholder="Ej. 987 654 321" maxlength="9">
        </div>
            <!-- tarjeta -->
        <div id="panel-tarjeta" class="pago-card p-4 mb-4" style="display:none;">
            <div class="mb-3">
                <label class="form-label small">Número de tarjeta</label>
                <input type="text" class="form-control" placeholder="0000 0000 0000 0000" maxlength="19">
            </div>
            <div class="mb-3">
                <label class="form-label small">Nombre del titular</label>
                <input type="text" class="form-control" placeholder="Como aparece en la tarjeta">
            </div>
            <div class="row g-3">
                <div class="col-7">
                    <label class="form-label small">Vencimiento</label>
                    <input type="text" class="form-control" placeholder="MM/AA" maxlength="5">
                </div>
                <div class="col-5">
                    <label class="form-label small">CVV</label>
                    <input type="text" class="form-control" placeholder="123" maxlength="3">
                </div>
            </div>
        </div>
            <!-- efectivo -->
        <div id="panel-efectivo" class="pago-card p-4 mb-4" style="display:none;">
            <p class="mb-2"><i class="bi bi-info-circle"></i> Pagarás al recoger tu pedido.</p>
            
        </div>

        <!-- Formulario de datos del pedido -->
        <form method="POST" action="pago.php" class="pago-card p-4">
            <h5 class="mb-3">Datos del pedido</h5>
            <div class="mb-3">
                <label class="form-label">Número de mesa</label>
                <input type="text" name="numero_mesa" class="form-control" placeholder="Ej: 1" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Cliente</label>
                <input type="text" name="cliente" class="form-control" placeholder="Ej: Juan" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Plato</label>
                <input
                    type="text"
                    name="plato"
                    class="form-control"
                    value="<?php echo htmlspecialchars($platoSeleccionado); ?>"
                    readonly
                    required>
            </div>
            <button type="submit" class="btn btn-pagar w-100 py-2">Confirmar pago</button>
        </form>

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

<!-- cambiar paneles según  el método seleccionado -->
<script>
const radios = document.querySelectorAll('input[name="metodo"]');

function mostrarPanel(metodo) {
    document.getElementById("panel-yape").style.display = "none";
    document.getElementById("panel-tarjeta").style.display = "none";
    document.getElementById("panel-efectivo").style.display = "none";

    if (metodo == "yape") {
        document.getElementById("panel-yape").style.display = "block";
    }

    if (metodo == "tarjeta") {
        document.getElementById("panel-tarjeta").style.display = "block";
    }

    if (metodo == "efectivo") {
        document.getElementById("panel-efectivo").style.display = "block";
    }
}

radios.forEach(function(radio) {
    radio.addEventListener("change", function() {
        mostrarPanel(radio.value);
    });
});

mostrarPanel("yape");
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>