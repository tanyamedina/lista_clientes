<?php
session_start(); // Iniciar la sesión

include 'db.php'; // Incluir la conexión a la base de datos

// Si el usuario está enviando el formulario de login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Limpiar posibles espacios
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Consulta para verificar si el usuario existe
    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            // La contraseña es correcta, iniciar la sesión
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            header("Location: dashboard.html");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    }
}        
?>