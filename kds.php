<?php
require("conecta.php");

// Obtener pedidos
$sql = "SELECT id, numero_mesa, cliente, plato, hora_pedido, estado FROM pedidos_kds ORDER BY id DESC";
$resultado = mysqli_query($cone, $sql);
$pedidos = [];
/* Recorre los registros y se obtienen */
while ($fila = mysqli_fetch_array($resultado)) {
    $pedidos[] = $fila;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="refresh" content="5">
    <meta charset="UTF-8">
    <title>KDS</title>
    <style>
        body { background: #1a1a1a; color: #fff; font-family: Arial; margin: 0; padding: 20px; }
        h1 { color: #ffd93d; }
        .pedido { background: #333; padding: 15px; margin: 10px 0; border-left: 5px solid red; border-radius: 5px; }
        .mesa { font-size: 20px; font-weight: bold; color: #ffd93d; }
        .estado-label { font-size: 14px; color: #ccc; margin: 10px 0; font-weight: bold; }
        .btn { padding: 10px 15px; background: #666; color: white; border: none; cursor: pointer; border-radius: 5px; margin-top: 10px; font-weight: bold; font-size: 14px; }
        .btn:hover { background: #888; }
        
        .estado-noIniciado { background: #666; }
        .estado-noIniciado:hover { background: #888; }
        
        .estado-preparando { background: #ff9800; }
        .estado-preparando:hover { background: #e68900; }
        
        .estado-porEntregar { background: #4caf50; }
        .estado-porEntregar:hover { background: #45a049; }
        
        .estado-entregado { background: #2196f3; }
        .estado-entregado:hover { background: #0b7dda; }
    </style>
</head>
<body>

<h1>KITCHEN DISPLAY SYSTEM</h1>
<p>Total de pedidos: <strong><?php echo count($pedidos); ?></strong></p>
<!-- DATOS DEL PEDIDO -->
<?php if (count($pedidos) === 0): ?>
    <p style="color: #888;">No hay pedidos</p>
<?php else: ?>
    <?php foreach ($pedidos as $p): ?>
        <div class="pedido">
            <div class="mesa">MESA <?php echo $p['numero_mesa']; ?></div>
            <p><strong>Cliente:</strong> <?php echo $p['cliente']; ?></p>
            <p><strong>Plato:</strong> <?php echo $p['plato']; ?></p>
            <p><strong>Hora:</strong> <?php echo $p['hora_pedido']; ?></p>
            
            <!-- Label estado -->
            <div class="estado-label" id="label-<?php echo $p['id']; ?>">Estado: ⏳ No iniciado</div>

            <!-- Botón de estado -->
            <button class="btn estado-noIniciado" onclick="cambiarEstado(<?php echo $p['id']; ?>)" id="btn-<?php echo $p['id']; ?>">
                ⏳ No iniciado
            </button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<script>
/* Obtiene los estados guardados del navegador. si no hay devuelve vacio*/
let estadosGuardados = JSON.parse(localStorage.getItem("estadosPedidos")) || {};

function cambiarEstado(id) {

    /* obtiene el botón y su label */
    let boton = document.getElementById("btn-" + id);
    let etiqueta = document.getElementById("label-" + id);

    /* click en botón y cambio de estado */
    if (boton.textContent == "⏳ No iniciado") {
        boton.textContent = "👨‍🍳 Preparando";
    } else if (boton.textContent == "👨‍🍳 Preparando") {
        boton.textContent = "📦 Por entregar";
    } else if (boton.textContent == "📦 Por entregar") {
        boton.textContent = "✓ Entregado";
    } else {
        boton.textContent = "⏳ No iniciado";
    }

    etiqueta.textContent = "Estado: " + boton.textContent;
    estadosGuardados[id] = boton.textContent;
    localStorage.setItem("estadosPedidos", JSON.stringify(estadosGuardados));
}

/* Cuando la página termina de cargar */
window.onload = function () {

    /* Recorre todos los pedidos guardados */
    for (let id in estadosGuardados) {

        /* Obtiene el estado guardado */
        let texto = estadosGuardados[id];

        /* Restaura el texto del botón */
        document.getElementById("btn-" + id).textContent = texto;

        /* Restaura el texto de la etiqueta */
        document.getElementById("label-" + id).textContent = "Estado: " + texto;
    }
};
</script>

</body>
</html>