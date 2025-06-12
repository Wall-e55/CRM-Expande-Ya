
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Paquete</title>
    <link rel="stylesheet" href="../views/clientes/create.css">
</head>
<body>
    <div class="form-container">
        <h2>Registrar Nuevo Paquete</h2>
        <form action="index.php?controller=paquete&action=store" method="post">
            <input type="hidden" name="cliente_id" value="<?php echo htmlspecialchars($_GET['cliente_id']); ?>">

            <label for="nombre_servicio">Nombre del Servicio:</label>
            <input type="text" name="nombre_servicio" id="nombre_servicio" required>

            <label for="monto">Monto:</label>
            <input type="number" step="0.01" name="monto" id="monto" required>

            <div class="btn-group">
                <button type="submit" class="btn btn-guardar">Guardar</button>
                <a href="index.php?controller=paquete&action=index&cliente_id=<?php echo htmlspecialchars($_GET['cliente_id']); ?>" class="btn btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>