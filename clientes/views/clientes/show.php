
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Cliente</title>
    <link rel="stylesheet" href="../views/clientes/create.css">
</head>
<body>
    <div class="form-container">
        <h2>Detalle del Cliente</h2>
        <?php if ($cliente): ?>
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($cliente['nombre']); ?></p>
            <p><strong>Apellidos:</strong> <?php echo htmlspecialchars($cliente['apellidos']); ?></p>
            <p><strong>DNI:</strong> <?php echo htmlspecialchars($cliente['dni']); ?></p>
            <p><strong>Celular:</strong> <?php echo htmlspecialchars($cliente['celular']); ?></p>
            <p><strong>Correo:</strong> <?php echo htmlspecialchars($cliente['correo']); ?></p>
        <?php else: ?>
            <p>No se encontró el cliente.</p>
        <?php endif; ?>
        <div class="btn-group" style="margin-top:20px;">
            <a href="index.php?controller=cliente&action=index" class="btn btn-cancelar">Volver</a>
        </div>
    </div>
</body>
</html>