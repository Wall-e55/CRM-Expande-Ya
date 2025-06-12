-- Tabla de clientes
CREATE TABLE cliente (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  apellidos VARCHAR(100) NOT NULL,
  dni VARCHAR(20) NOT NULL,
  celular VARCHAR(20),
  correo VARCHAR(100)
);

-- Tabla de paquetes (servicios contratados por cliente)
CREATE TABLE paquete (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cliente_id INT NOT NULL,
  nombre_servicio VARCHAR(100) NOT NULL,
  monto DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (cliente_id) REFERENCES cliente(id)
);