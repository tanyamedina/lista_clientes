<?php
$host = 'localhost'; // Dirección del servidor
$db = 'clientes_db'; // Nombre de tu base de datos
$user = 'root'; // Usuario (por defecto root en localhost)
$pass = ''; // Contraseña (deja en blanco si no tienes contraseña en localhost)

// Crear la conexión
$conn = new mysqli($host, $user, $pass, $db);

// Comprobar la conexión
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}
?>