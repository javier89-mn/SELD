<?php
// guardarLiquidacion.php

define('BASEPATH', __DIR__ . '../../Backend/');

require_once BASEPATH . 'conexion.php';

require_once '../../Backend/conexion.php'; // Asegúrate de que la ruta sea correcta
// Este archivo se encarga de recibir los datos de liquidación desde el frontend y guardarlos en la base de datos.
// Se espera que el frontend envíe un JSON con la estructura adecuada para 'liquidaciones', 'costos' y 'anticipos'.


// Conexión a la base de datos
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');


// Obtener datos del frontend
$data = json_decode(file_get_contents('php://input'), true);
// Iniciar transacción
$conexion->begin_transaction();

try {
    // Insertar en 'liquidaciones'
    $stmt = $conexion->prepare("INSERT INTO liquidaciones (folio, fechaHora, origen, unidad, operador, cliente, flete, maniobras, destino, kilometrosIniciales, kilometrosFinales, kilometrosRecorridos, ordenServicio, remolque, otros, concepto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssddsdiiisss", 
        $data['liquidacion']['folio'],
        $data['liquidacion']['fechaHora'],
        $data['liquidacion']['origen'],
        $data['liquidacion']['unidad'],
        $data['liquidacion']['listaOperadores'],
        $data['liquidacion']['listaClientes'],
        $data['liquidacion']['flete'],
        $data['liquidacion']['maniobras'],
        $data['liquidacion']['destino'],
        $data['liquidacion']['kilometrosIniciales'],
        $data['liquidacion']['kilometrosFinales'],
        $data['liquidacion']['kilometrosRecorridos'],
        $data['liquidacion']['ordenServicio'],
        $data['liquidacion']['remolque'],
        $data['liquidacion']['otros'],
        $data['liquidacion']['concepto']
    );
    $stmt->execute();
    $liquidacion_id = $conexion->insert_id;

    // Insertar en 'costos'
    $stmt = $conexion->prepare("INSERT INTO costos (liquidacion_id, carga, casetas, descarga, comisionOperador, compensacionDias, costoCombustible, gastosExtra, combustibleNoComprobable, otros, refacciones, rampas, talachas, transito) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("idddddddddddd", 
        $liquidacion_id,
        $data['costo']['seld']['carga'],
        $data['costo']['seld']['casetas'],
        $data['costo']['seld']['descarga'],
        $data['costo']['seld']['comisionOperador'],
        $data['costo']['seld']['compensacionDias'],
        $data['costo']['seld']['costoCombustible'],
        $data['costo']['seld']['gastosExtra'],
        $data['costo']['seld']['combustibleNoComprobable'],
        $data['costo']['seld']['otros'],
        $data['costo']['seld']['refacciones'],
        $data['costo']['seld']['rampas'],
        $data['costo']['seld']['talachas'],
        $data['costo']['seld']['transito']
    );
    $stmt->execute();

    // Insertar en 'anticipos'
    foreach ($data['anticipo']['anticipos'] as $anticipo) {
        $stmt = $conexion->prepare("INSERT INTO anticipos (liquidacion_id, monto, fecha) VALUES (?, ?, ?)");
        $stmt->bind_param("ids", $liquidacion_id, $anticipo['monto'], $anticipo['fecha']);
        $stmt->execute();
    }

    // Confirmar transacción
    $conexion->commit();
    echo json_encode(['success' => true, 'message' => 'Datos guardados correctamente.']);

} catch (Exception $e) {
    // Revertir transacción en caso de error
    $conexion->rollback();
    echo json_encode(['success' => false, 'message' => 'Error al guardar los datos: ' . $e->getMessage()]);
}

// Responder al frontend
echo json_encode(['success' => true]);
$conexion->close();
?>
