<?php
session_start(); // Iniciar la sesión

include 'db.php'; // Incluye el archivo de conexión a la base de datos

// Ahora verificamos si el usuario está autenticado para devolver los datos
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Consulta SQL para obtener los datos de la tabla clientes
    $sql = "SELECT id, nombre, apellido, telefono FROM clientes";
    $result = $conn->query($sql);

    $clientes = [];

    if ($result->num_rows > 0) {
        // Guardar los datos en un array
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }
    }

    // Devolver los datos en formato JSON
    echo json_encode($clientes);
} else {
    // Si el usuario no está autenticado, devolvemos un mensaje de error
    echo json_encode(["error" => "No estás autenticado."]);
}
?>