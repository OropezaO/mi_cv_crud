<?php
$servername = "localhost";
$username = "root";
$password = ""; // Deja esto vacío si no configuraste contraseña en XAMPP.
$dbname = "crud_cv";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
