
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="../views/clientes/index.css">
</head>
<body>
    <div class="form-container">
        <h2>Clientes Registrados</h2>
        <a href="index.php?controller=cliente&action=create" class="btn btn-guardar" style="margin-bottom:20px;display:inline-block;">+ Nuevo Cliente</a>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clientes)): ?>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cliente['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['apellidos']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['dni']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['celular']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['correo']); ?></td>
                            <td style="text-align:center;">
                                <a href="index.php?controller=cliente&action=edit&id=<?php echo $cliente['id']; ?>" class="btn btn-guardar" style="padding:6px 16px;font-size:0.9em;">Editar</a>
                                <a href="index.php?controller=cliente&action=delete&id=<?php echo $cliente['id']; ?>" class="btn btn-cancelar" style="padding:6px 16px;font-size:0.9em;" onclick="return confirm('¿Seguro que deseas eliminar este cliente?');">Eliminar</a>
                                <a href="index.php?controller=paquete&action=index&cliente_id=<?php echo $cliente['id']; ?>" class="btn btn-guardar" style="padding:6px 16px;font-size:0.9em;background:#2e318f;">Ver Paquetes</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center;padding:16px;">No hay clientes registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>