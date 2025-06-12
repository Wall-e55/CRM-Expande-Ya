
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Cliente</title>
    <link rel="stylesheet" href="../views/clientes/create.css">
</head>
<body>
    <div class="form-container">
        <h2>Registrar Nuevo Cliente</h2>
        <form action="index.php?controller=cliente&action=store" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" required>

            <label for="dni">DNI:</label>
            <input type="text" name="dni" id="dni" required>

            <label for="celular">Celular:</label>
            <input type="text" name="celular" id="celular">

            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo">

            <div class="btn-group">
                <button type="submit" class="btn btn-guardar">Agregar</button>
                <a href="index.php?controller=cliente&action=index" class="btn btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>s