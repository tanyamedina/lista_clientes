<?php
include 'db.php'; // Incluir la conexión a la base de datos

// Verificar si se han enviado los datos del formulario
if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];

    // Preparar la consulta SQL para insertar el cliente
    $sql = "INSERT INTO clientes (nombre, apellido, telefono) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $apellido, $telefono);

    if ($stmt->execute()) {
        echo "Cliente agregado correctamente.";
    } else {
        echo "Error al agregar el cliente: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>