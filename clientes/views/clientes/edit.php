
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../views/clientes/create.css">
</head>
<body>
    <div class="form-container">
        <h2>Editar Cliente</h2>
        <form action="index.php?controller=cliente&action=update" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($cliente['id']); ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($cliente['nombre']); ?>" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo htmlspecialchars($cliente['apellidos']); ?>" required>

            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni" value="<?php echo htmlspecialchars($cliente['dni']); ?>" required>

            <label for="celular">Celular:</label>
            <input type="text" name="celular" id="celular" value="<?php echo htmlspecialchars($cliente['celular']); ?>">

            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" value="<?php echo htmlspecialchars($cliente['correo']); ?>">

            <div class="btn-group">
                <button type="submit" class="btn btn-guardar">Guardar</button>
                <a href="index.php?controller=cliente&action=index" class="btn btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>