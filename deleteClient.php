<?php
include 'db.php'; // Conexión a la base de datos

if (isset($_POST['id'])) {
    $id = intval($_POST['id']); // Asegurarse de que $id sea un número entero


    // Preparar la consulta SQL para borrar al cliente
    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Cliente eliminado correctamente"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error al eliminar el cliente."]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "ID no proporcionado."]);
}
?>