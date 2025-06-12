<?php

// Enrutador principal para el sistema MVC

// Definir rutas base
define('ROOT', dirname(__DIR__));

// Autocarga sencilla de controladores
function cargarControlador($nombre) {
    $archivo = ROOT . '/controllers/' . ucfirst($nombre) . 'Controller.php';
    if (file_exists($archivo)) {
        require_once $archivo;
        $clase = ucfirst($nombre) . 'Controller';
        return new $clase();
    }
    return null;
}

// Obtener parámetros de la URL
$controller = isset($_GET['controller']) ? strtolower($_GET['controller']) : 'cliente';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Cargar el controlador correspondiente
$controlador = cargarControlador($controller);

if ($controlador && method_exists($controlador, $action)) {
    // Si es POST, pasar $_POST; si es GET, pasar parámetros según acción
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controlador->$action($_POST);
    } else {
        // Para acciones que requieren ID o cliente_id
        if (isset($_GET['id'])) {
            $controlador->$action($_GET['id']);
        } elseif (isset($_GET['cliente_id'])) {
            $controlador->$action($_GET['cliente_id']);
        } else {
            $controlador->$action();
        }
    }
} else {
    // Controlador o acción no encontrada
    echo "<h2 style='color:red;text-align:center;margin-top:40px;'>Página no encontrada</h2>";
}
?>