<?php
require_once __DIR__ . '/../models/Paquete.php';
require_once __DIR__ . '/../config/database.php';

class PaqueteController {
    private $db;
    private $paquete;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->paquete = new Paquete($this->db);
    }

    // Listar paquetes de un cliente
    public function index($cliente_id) {
        $stmt = $this->paquete->getByCliente($cliente_id);
        $paquetes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/paquetes/index.php';
    }

    // Mostrar formulario para crear paquete
    public function create($cliente_id) {
        include __DIR__ . '/../views/paquetes/create.php';
    }

    // Guardar nuevo paquete
    public function store($data) {
        $this->paquete->cliente_id = $data['cliente_id'];
        $this->paquete->nombre_servicio = $data['nombre_servicio'];
        $this->paquete->monto = $data['monto'];
        $this->paquete->create();
        header("Location: index.php?controller=paquete&action=index&cliente_id=" . $data['cliente_id']);
        exit;
    }

    // Mostrar formulario para editar paquete
    public function edit($id) {
        $paquete = $this->paquete->getById($id);
        include __DIR__ . '/../views/paquetes/edit.php';
    }

    // Actualizar paquete
    public function update($data) {
        $this->paquete->id = $data['id'];
        $this->paquete->nombre_servicio = $data['nombre_servicio'];
        $this->paquete->monto = $data['monto'];
        $this->paquete->update();
        header("Location: index.php?controller=paquete&action=index&cliente_id=" . $data['cliente_id']);
        exit;
    }

    // Eliminar paquete
    public function delete($id, $cliente_id) {
        $this->paquete->id = $id;
        $this->paquete->delete();
        header("Location: index.php?controller=paquete&action=index&cliente_id=" . $cliente_id);
        exit;
    }
}
?>