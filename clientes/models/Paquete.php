<?php
// Modelo Paquete: representa la tabla 'paquete' y sus operaciones CRUD
class Paquete {
    private $conn;
    private $table_name = "paquete";

    public $id;
    public $cliente_id;
    public $nombre_servicio;
    public $monto;

    // Constructor: recibe la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los paquetes de un cliente
    public function getByCliente($cliente_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE cliente_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$cliente_id]);
        return $stmt;
    }

    // Crear un nuevo paquete
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (cliente_id, nombre_servicio, monto) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->cliente_id, $this->nombre_servicio, $this->monto]);
    }

    // Actualizar un paquete existente
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre_servicio = ?, monto = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->nombre_servicio, $this->monto, $this->id]);
    }

    // Eliminar un paquete
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id]);
    }

    // Obtener un paquete por su ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>