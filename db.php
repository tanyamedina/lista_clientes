<?php
$host = 'dpg-cs2qhmdumphs73epkfig-a'; // El host proporcionado por Render
$db = 'clientes_db_4n8r'; // El nombre de la base de datos en PostgreSQL
$user = 'tanya'; // El usuario proporcionado por Render
$pass = 'LnjE4CCjgo7as9nLyfntyAXlxON0WVmA'; // La contraseña proporcionada por Render

// Nueva conexión con PDO para PostgreSQL
try {
    $dsn = "pgsql:host=$host;port=5432;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "Conexión exitosa a PostgreSQL";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
