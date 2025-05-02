<?php
session_start();

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
$username = $_POST['username'];
$password = $_POST['password'];

// Verificar credenciales
$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Credenciales correctas
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $username;

        // Actualizar el campo last_login con la fecha y hora actual
        $update_sql = "UPDATE usuarios SET last_login = NOW() WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $row['id']);
        $update_stmt->execute();
        $update_stmt->close();

        // Redirigir al dashboard
        header("Location: /-Dasboard_perfiles/index.php");
        exit();
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta";
    }
} else {
    // Usuario no encontrado
    echo "Usuario no encontrado";
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>