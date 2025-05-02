<?php
session_start();
//Con esete metodo sera esencial para poder ejemplificar los procesos de tal manera que el usuario pueda tener una mejor experiencia en els sismtema
require_once __DIR__ . '/../Backend/config.php'; // Conexión a la base de datos, en donde se hace la referencia que esta dentro de una carpte y a su vez esta dentro un seccion disintinta
header('Content-Type: application/json'); // Asegurarse de que la respuesta sea JSON

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Usuario no autenticado"]);
    exit;
}

// Obtener el ID del usuario desde la sesión
$user_id = $_SESSION['user_id'];

// Obtener los datos del usuario desde la base de datos
$sql = "SELECT username, created_at, last_login, active_since FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo json_encode(["status" => "error", "message" => "Error en la preparación de la consulta: " . $conn->error]);
    exit;
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode(["status" => "success", "username" => $user['username'], "created_at" => $user['created_at'], "last_login" => $user['last_login'], "active_since" => $user['active_since']]);
} else {
    echo json_encode(["status" => "error", "message" => "Usuario no encontrado"]);
}

$stmt->close();
$conn->close();

?>