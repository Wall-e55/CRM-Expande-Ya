<?php
// Modelo Cliente: representa la tabla 'cliente' y sus operaciones CRUD
class Cliente {
    private $conn;
    private $table_name = "cliente";

    public $id;
    public $nombre;
    public $apellidos;
    public $dni;
    public $celular;
    public $correo;

    // Constructor: recibe la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los clientes
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Crear un nuevo cliente
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, apellidos, dni, celular, correo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->nombre,
            $this->apellidos,
            $this->dni,
            $this->celular,
            $this->correo
        ]);
    }

    // Actualizar un cliente existente
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre = ?, apellidos = ?, dni = ?, celular = ?, correo = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $this->nombre,
            $this->apellidos,
            $this->dni,
            $this->celular,
            $this->correo,
            $this->id
        ]);
    }

    // Eliminar un cliente
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$this->id]);
    }

    // Obtener un cliente por su ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>