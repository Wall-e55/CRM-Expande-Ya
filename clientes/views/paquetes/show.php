
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Paquete</title>
    <link rel="stylesheet" href="../views/clientes/create.css">
</head>
<body>
    <div class="form-container">
        <h2>Detalle del Paquete</h2>
        <?php if ($paquete): ?>
            <p><strong>Nombre del Servicio:</strong> <?php echo htmlspecialchars($paquete['nombre_servicio']); ?></p>
            <p><strong>Monto:</strong> S/ <?php echo htmlspecialchars($paquete['monto']); ?></p>
            <p><strong>ID Cliente:</strong> <?php echo htmlspecialchars($paquete['cliente_id']); ?></p>
        <?php else: ?>
            <p>No se encontró el paquete.</p>
        <?php endif; ?>
        <div class="btn-group" style="margin-top:20px;">
            <a href="index.php?controller=paquete&action=index&cliente_id=<?php echo htmlspecialchars($paquete['cliente_id']); ?>" class="btn btn-cancelar">Volver</a>
        </div>
    </div>
</body>
</html>