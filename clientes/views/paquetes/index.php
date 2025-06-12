
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Paquetes del Cliente</title>
    <link rel="stylesheet" href="../views/clientes/create.css">
</head>
<body>
    <div class="form-container">
        <h2>Paquetes del Cliente</h2>
        <a href="index.php?controller=paquete&action=create&cliente_id=<?php echo htmlspecialchars($_GET['cliente_id']); ?>" class="btn btn-guardar" style="margin-bottom:20px;display:inline-block;">+ Nuevo Paquete</a>
        <table style="width:100%;border-collapse:collapse;">
            <thead>
                <tr>
                    <th style="text-align:left;padding:8px;">Nombre del Servicio</th>
                    <th style="text-align:left;padding:8px;">Monto</th>
                    <th style="text-align:center;padding:8px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($paquetes)): ?>
                    <?php foreach ($paquetes as $paquete): ?>
                        <tr>
                            <td style="padding:8px;"><?php echo htmlspecialchars($paquete['nombre_servicio']); ?></td>
                            <td style="padding:8px;"><?php echo htmlspecialchars($paquete['monto']); ?></td>
                            <td style="text-align:center;padding:8px;">
                                <a href="index.php?controller=paquete&action=edit&id=<?php echo $paquete['id']; ?>&cliente_id=<?php echo htmlspecialchars($_GET['cliente_id']); ?>" class="btn btn-guardar" style="padding:6px 16px;font-size:0.9em;">Editar</a>
                                <a href="index.php?controller=paquete&action=delete&id=<?php echo $paquete['id']; ?>&cliente_id=<?php echo htmlspecialchars($_GET['cliente_id']); ?>" class="btn btn-cancelar" style="padding:6px 16px;font-size:0.9em;" onclick="return confirm('¿Seguro que deseas eliminar este paquete?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="text-align:center;padding:16px;">No hay paquetes registrados para este cliente.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="btn-group" style="margin-top:20px;">
            <a href="index.php?controller=cliente&action=index" class="btn btn-cancelar">Volver a Clientes</a>
        </div>
    </div>
</body>
</html>