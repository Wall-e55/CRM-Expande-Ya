<?php
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../config/database.php';

class ClienteController {
    private $db;
    private $cliente;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->cliente = new Cliente($this->db);
    }

    // Listar todos los clientes
    public function index() {
        $stmt = $this->cliente->getAll();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/clientes/index.php';
    }

    // Mostrar formulario para crear cliente
    public function create() {
        include __DIR__ . '/../views/clientes/create.php';
    }

    // Guardar nuevo cliente
    public function store($data) {
        $this->cliente->nombre = $data['nombre'];
        $this->cliente->apellidos = $data['apellidos'];
        $this->cliente->dni = $data['dni'];
        $this->cliente->celular = $data['celular'];
        $this->cliente->correo = $data['correo'];
        $this->cliente->create();
        header("Location: index.php?controller=cliente&action=index");
        exit;
    }

    // Mostrar formulario para editar cliente
    public function edit($id) {
        $cliente = $this->cliente->getById($id);
        include __DIR__ . '/../views/clientes/edit.php';
    }

    // Actualizar cliente
    public function update($data) {
        $this->cliente->id = $data['id'];
        $this->cliente->nombre = $data['nombre'];
        $this->cliente->apellidos = $data['apellidos'];
        $this->cliente->dni = $data['dni'];
        $this->cliente->celular = $data['celular'];
        $this->cliente->correo = $data['correo'];
        $this->cliente->update();
        header("Location: index.php?controller=cliente&action=index");
        exit;
    }

    // Eliminar cliente
    public function delete($id) {
        $this->cliente->id = $id;
        $this->cliente->delete();
        header("Location: index.php?controller=cliente&action=index");
        exit;
    }

    // Mostrar detalles de un cliente
    public function show($id) {
        $cliente = $this->cliente->getById($id);
        include __DIR__ . '/../views/clientes/show.php';
    }
}
?>