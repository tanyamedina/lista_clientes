<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Comprobar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados mediante POST
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];

    // Validar que todos los campos estén completos
    if (!empty($id) && !empty($nombre) && !empty($apellido) && !empty($telefono)) {
        // Preparar la consulta SQL para actualizar los datos del cliente
        $stmt = $conn->prepare("UPDATE clientes SET nombre=?, apellido=?, telefono=? WHERE id=?");
        $stmt->bind_param("sssi", $nombre, $apellido, $telefono, $id);

        // Ejecutar la consulta y verificar si fue exitosa
        if ($stmt->execute()) {
            // Enviar respuesta de éxito
            echo json_encode(['status' => 'success']);
        } else {
            // Enviar respuesta de error si hubo un problema al actualizar
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar los datos.']);
        }

        // Cerrar la declaración preparada
        $stmt->close();
    } else {
        // Enviar respuesta de error si faltan datos
        echo json_encode(['status' => 'error', 'message' => 'Faltan datos obligatorios.']);
    }
} else {
    // Enviar respuesta de error si no es una solicitud POST
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido.']);
}

// Cerrar la conexión a la base de datos
$conn->close();
?>