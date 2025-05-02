<?php
// filepath: /c:/Users/Javier/OneDrive/Escritorio/One Drive/OneDrive/Documentos/Sistema_Logistica/reset-password.php

// Conexión a la base de datos
require_once 'Backend/config.php'; // Incluir el archivo de configuración

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el token de la URL
$token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_SPECIAL_CHARS);

if ($token) {
    // Verificar si el token es válido y no ha expirado
    $sql = "SELECT * FROM usuarios WHERE reset_token = ? AND reset_token_expiry > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Mostrar el formulario para restablecer la contraseña
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $new_password = password_hash($_POST['new-password'], PASSWORD_DEFAULT);

            // Actualizar la contraseña en la base de datos
            $sql = "UPDATE usuarios SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE reset_token = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_password, $token);
            $stmt->execute();

            echo "Contraseña restablecida exitosamente.";
        } else {
            echo '
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="new-password" class="form-label">Nueva Contraseña</label>
                    <input type="password" class="form-control" id="new-password" name="new-password" required placeholder="Crea una nueva contraseña">
                </div>
                <button type="submit" class="btn btn-primary w-100">Restablecer Contraseña</button>
            </form>
            ';
        }
    } else {
        echo "El enlace de recuperación es inválido o ha expirado.";
    }

    // Cerrar conexión
    $stmt->close();
} else {
    echo "Token no válido.";
}

$conn->close();
?>