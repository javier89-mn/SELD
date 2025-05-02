<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto si tienes un usuario diferente
$password = "usbw"; // Cambia esto si tienes una contraseña diferente
$dbname = "seld";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$new_username = $_POST['new-username'];
$new_email = $_POST['new-email'];
$new_password = password_hash($_POST['new-password'], PASSWORD_DEFAULT); // Encriptar la contraseña

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (username, email, password) VALUES ('$new_username', '$new_email', '$new_password')";

if ($conn->query($sql) === TRUE) {
    header("Location: /Inicio_sesion.html"); // Redirigir a la página de inicio de sesión
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>