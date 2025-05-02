<?php
//echo getcwd(); // Muestra el directorio actual del script

require_once 'Backend/config.php'; // Incluir el archivo de configuración

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = filter_input(INPUT_POST, 'recover-email', FILTER_SANITIZE_EMAIL);

if ($email) {
    // Verificar si el correo electrónico existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generar un token de recuperación
        $token = bin2hex(random_bytes(50));

        // Guardar el token en la base de datos con una fecha de expiración
        $sql = "UPDATE usuarios SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Enviar el correo electrónico de recuperación
        $resetLink = "http://localhost/reset-password.php?token=" . $token;
        $subject = "Recuperación de contraseña";
        $message = "Haz clic en el siguiente enlace para restablecer tu contraseña: " . $resetLink;
        $headers = "From: no-reply@seld.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "Correo de recuperación enviado. Por favor, revisa tu bandeja de entrada.";
        } else {
            echo "Error al enviar el correo de recuperación.";
        }
    } else {
        echo "Correo electrónico no encontrado.";
    }

    // Cerrar conexión
    $stmt->close();
} else {
    echo "Correo electrónico no válido.";
}

$conn->close();
?>