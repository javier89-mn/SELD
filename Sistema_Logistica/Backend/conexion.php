<?php 
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; 
$password = "usbw"; 
$dbname = "seld"; 

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>