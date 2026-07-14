<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Metalúrgica</title>
    <link rel="stylesheet" href="./css/index2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a61f393dda.js" crossorigin="anonymous"></script>
</head>
<body>


<section id="main">
    <!-- Video -->
    <video id="video" autoplay muted loop playsinline>
        <source src="./img/vid.mp4" type="video/mp4">
    </video>

    <!-- Sección principal -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="./img/logo.png" width="70" alt="Logo La Metalúrgica">
            </a>
            <!-- Navbar -->
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-lg-auto text-end">
                    <li class="nav-item"><a class="nav-link text-white px-3" href="./index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-white px-3" href="./carta.php">Carta</a></li>
                    <li class="nav-item"><a class="nav-link text-white px-3" href="#footer">Nosotros</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Título y botones -->
    <div class="hero d-flex flex-column align-items-center text-center text-white">
        <h1 class="display-1">RESTAURANTE <br> LA METALÚRGICA</h1>
        <div class="mt-3">
            <a href="./carta.php" target="_blank" class="btn btn-light">Ver carta</a>
            <a href="#mainprincipal" class="btn btn-outline-light">Nuestra historia</a>
        </div>
    </div>
</section>

<!-- Contenido: historia -->
<section class="py-5" style="background-color:#fbe1d3;" id="mainprincipal">
    <div class="container py-4">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fst-italic" style="font-family: 'Georgia', serif;">
                    "Donde antes se forjaba acero,<br> hoy se forja el sabor."
                </h2>
            </div>
            <div class="col-lg-6 text-center">
                <img src="./img/img2.jpg" class="img-fluid rounded shadow" alt="Horno de leña">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="./img/img3.jpg" class="img-fluid rounded shadow" alt="Salón del restaurante">
            </div>
            <div class="col-lg-6">
                <h3 class="fst-italic mb-4" style="font-family: 'Georgia', serif;">
                    Hace un siglo,<br> aquí chispeaba el acero.<br> Hoy chispea la brasa.
                </h3>
                <p>
                    En el corazón del viejo barrio industrial, La Metalúrgica ocupa lo que un día
                    fue una fragua donde el hierro se doblegaba al fuego y al martillo. Rescatamos
                    el espacio tal como era —áspero, noble, verdadero— y transformamos las
                    cicatrices del carbón en textura, las antiguas máquinas en horno de leña y el
                    rugido de los fuelles en el crepitar de las brasas. Hoy, nuestra cocina trabaja con
                    la misma precisión del artesano: cada plato es una pieza única forjada con temple,
                    paciencia y fuego. Forjar el sabor es nuestro oficio.
                </p>
            </div>
        </div>
    </div>

    <!-- Chatbot -->
    <div id="chat-widget-container" class="position-fixed bottom-0 end-0 m-3">
        <div id="chat-window">
            <div id="chat-header" class="d-flex align-items-center justify-content-between px-3 py-2">
                <div class="d-flex align-items-center gap-2">
                    <span id="chat-status-dot"></span>
                    <span>Asistente virtual</span>
                </div>
                <button class="btn-close btn-close-white" onclick="toggleChat(false)" aria-label="Cerrar"></button>
            </div>
            <div id="chat-messages" class="p-3">
                <div class="chat-msg chat-msg-bot">Hola, soy tu asistente virtual. ¿En qué puedo ayudarte?</div>
            </div>
            <div id="chat-input-bar" class="d-flex align-items-center gap-2 p-2">
                <input type="text" id="chat-input" class="form-control" placeholder="Escribe tu pregunta..." onkeydown="if (event.key === 'Enter') enviar()">
                <button id="chat-send-btn" class="btn" onclick="enviar()" aria-label="Enviar">
                    <i class="bi bi-send-fill"></i>
                </button>
            </div>
        </div>
        <button id="chat-toggle-btn" class="btn rounded-circle" onclick="toggleChat()" aria-label="Abrir chat">
            <i class="bi bi-chat-dots-fill"></i>
        </button>
    </div>
</section>
<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const API_KEY = "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";

    function toggleChat(forzarEstado) {
        const ventana = document.getElementById('chat-window');
        const abrir = forzarEstado !== undefined ? forzarEstado : !ventana.classList.contains('open');
        ventana.classList.toggle('open', abrir);
        if (abrir) document.getElementById('chat-input').focus();
    }

    function agregarMensaje(texto, tipo) {
        const contenedor = document.getElementById('chat-messages');
        const mensaje = document.createElement('div');
        mensaje.className = `chat-msg chat-msg-${tipo}`;
        mensaje.textContent = texto;
        contenedor.appendChild(mensaje);
        contenedor.scrollTop = contenedor.scrollHeight;
        return mensaje;
    }

    async function enviar() {
        const input = document.getElementById('chat-input');
        const pregunta = input.value.trim();
        if (!pregunta) return;

        agregarMensaje(pregunta, 'user');
        input.value = '';

        const indicadorEscribiendo = agregarMensaje('Escribiendo...', 'typing');

        try {
            const respuesta = await fetch('https://api.groq.com/openai/v1/chat/completions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${API_KEY}`
                },
                body: JSON.stringify({
                    model: 'llama-3.3-70b-versatile',
                    messages: [{ role: 'user', content: pregunta }]
                })
            });

            const datos = await respuesta.json();
            indicadorEscribiendo.remove();

            const textoRespuesta = datos.choices?.[0]?.message?.content || 'No obtuve respuesta.';
            agregarMensaje(textoRespuesta, 'bot');

        } catch (error) {
            indicadorEscribiendo.remove();
            agregarMensaje('Error: ' + error.message, 'bot');
        }
    }
</script>

<!-- Footer -->
<footer class="text-white py-5" style="background-color:#4a3b35;" id="footer">
    <div class="container-fluid px-3 px-lg-5">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-lg-between gap-4">
        <!-- Logo y texto -->    
        <div class="d-flex align-items-center">
                <img src="./img/logo.png" width="110" class="me-3" alt="Logo">
                <div>
                    <h3 class="fw-bold mb-0">LA METALÚRGICA</h3>
                    <p class="mb-0">Donde el fuego forja el sabor.</p>
                </div>
            </div>
            <!-- Horarios -->
            <div>
                <h5 class="fw-bold">Horario</h5>
                <p class="mb-1">Mar - Sáb: 7:30 - 17:00</p>
                <p class="mb-1">Dom: 7:30 - 21:00</p>
                <p class="mb-3">Lun: Cerrado</p>
                <p class="mb-0"><i class="bi bi-telephone-fill"></i> +51 123 456 789</p>
            </div>
            <!-- Contacto -->
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
    <!-- Información de la empresa y desarrolladores -->
    <hr class="border-light my-4 mx-0" style="width:100%; opacity:0.3;">
    <div class="container-fluid px-3 px-lg-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between">
            <p class="mb-0">&copy; 2026 La Metalúrgica. Todos los derechos reservados.</p>
            <p class="mb-0">Sitio desarrollado por: Banzer Irene - Pauccara Benites.</p>
        </div>
    </div>
</footer>


</body>
</html>