<?php
// Conectar a la base de datos MySQL
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "clientes_db";
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Cargar el archivo XML
$xml = simplexml_load_file('clientes.xml') or die("Error: No se pudo cargar el archivo XML.");

// Iterar sobre cada elemento del archivo XML e insertar en la base de datos
foreach ($xml->cliente as $cliente) {
    $nombre = $cliente->nombre;
    $apellido = $cliente->apellido;
    $telefono = $cliente->telefono;

    // Preparar la consulta SQL para insertar los datos en la tabla 'clientes'
    $sql = "INSERT INTO clientes (nombre, apellido, telefono) VALUES ('$nombre', '$apellido', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
