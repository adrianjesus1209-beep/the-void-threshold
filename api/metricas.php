<?php
header('Content-Type: application/json; charset=utf-8');

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
$allowed_origins = ['http://localhost', 'http://127.0.0.1'];
if (in_array($origin, $allowed_origins)) {
    header('Access-Control-Allow-Origin: ' . $origin);
} elseif (isset($_SERVER['HTTP_HOST'])) {
    $host = $_SERVER['HTTP_HOST'];
    if ($host === 'localhost' || $host === '127.0.0.1' || explode(':', $host)[0] === 'localhost') {
        header('Access-Control-Allow-Origin: http://' . $host);
    }
}

require_once __DIR__ . '/db_conexion.php';

try {
    $conexion = obtenerConexionDB();
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error de conexión a la base de datos: ' . $e->getMessage()]);
    exit;
}

function obtener_ip_cliente() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    return $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
}

$tipo = $_GET['tipo'] ?? '';
$ip_cliente = obtener_ip_cliente();

if ($tipo === 'visita') {
    $stmt = $conexion->prepare("INSERT INTO registros_metricas (tipo, direccion_ip) VALUES ('visita', :ip)");
    $stmt->execute([':ip' => $ip_cliente]);
    echo json_encode(['success' => true, 'mensaje' => 'Visita registrada en la base de datos']);
    exit;
}

if ($tipo === 'descarga') {
    $stmt = $conexion->prepare("INSERT INTO registros_metricas (tipo, direccion_ip) VALUES ('descarga', :ip)");
    $stmt->execute([':ip' => $ip_cliente]);
    echo json_encode(['success' => true, 'mensaje' => 'Descarga registrada en la base de datos']);
    exit;
}

session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    http_response_code(403);
    echo json_encode(['error' => 'Acceso no autorizado']);
    exit;
}

$queryVisitas = $conexion->query("SELECT COUNT(*) AS total FROM registros_metricas WHERE tipo = 'visita'");
$visitasTotales = (int)$queryVisitas->fetch()['total'];

$queryDescargas = $conexion->query("SELECT COUNT(*) AS total FROM registros_metricas WHERE tipo = 'descarga'");
$descargasTotales = (int)$queryDescargas->fetch()['total'];

$queryUsuariosUnicos = $conexion->query("SELECT COUNT(DISTINCT direccion_ip) AS total FROM registros_metricas WHERE tipo = 'visita'");
$usuariosUnicos = (int)$queryUsuariosUnicos->fetch()['total'];

$fechaInicioParam = $_GET['fecha_inicio'] ?? '';
$fechaFinParam = $_GET['fecha_fin'] ?? '';
$maxDias = 730;

if ($fechaInicioParam && $fechaFinParam && $fechaFinParam !== 'all') {
    $fechaInicio = $fechaInicioParam;
    $fechaFin = $fechaFinParam;
} elseif ($fechaFinParam === 'all') {
    $queryPrimera = $conexion->query("SELECT MIN(fecha_registro) AS primera FROM registros_metricas");
    $primera = $queryPrimera->fetch()['primera'];
    $fechaInicio = $primera ? date('Y-m-d', strtotime($primera)) : date('Y-m-d', strtotime('-7 days'));
    $fechaFin = date('Y-m-d');
} else {
    $fechaInicio = date('Y-m-d', strtotime('-6 days'));
    $fechaFin = date('Y-m-d');
}

$diasRango = (int)floor((strtotime($fechaFin) - strtotime($fechaInicio)) / 86400) + 1;
if ($diasRango > $maxDias) {
    $fechaInicio = date('Y-m-d', strtotime("-{$maxDias} days"));
    $diasRango = $maxDias;
}
if ($diasRango < 1) $diasRango = 1;

$esSemanal = $diasRango > 30;

$labels = [];
$visitasSemana = [];
$descargasSemana = [];

if (!$esSemanal) {
    for ($i = 0; $i < $diasRango; $i++) {
        $fecha = date('Y-m-d', strtotime("$fechaInicio +{$i} days"));
        $labels[] = date('d M', strtotime($fecha));

        $stmtV = $conexion->prepare("SELECT COUNT(*) AS total FROM registros_metricas WHERE tipo = 'visita' AND DATE(fecha_registro) = :fecha");
        $stmtV->execute([':fecha' => $fecha]);
        $visitasSemana[] = (int)$stmtV->fetch()['total'];

        $stmtD = $conexion->prepare("SELECT COUNT(*) AS total FROM registros_metricas WHERE tipo = 'descarga' AND DATE(fecha_registro) = :fecha");
        $stmtD->execute([':fecha' => $fecha]);
        $descargasSemana[] = (int)$stmtD->fetch()['total'];
    }
} else {
    $stmtWeeks = $conexion->prepare(
        "SELECT YEARWEEK(fecha_registro, 1) AS semana, tipo, COUNT(*) AS total
         FROM registros_metricas
         WHERE DATE(fecha_registro) BETWEEN :inicio AND :fin
         GROUP BY YEARWEEK(fecha_registro, 1), tipo
         ORDER BY semana ASC"
    );
    $stmtWeeks->execute([':inicio' => $fechaInicio, ':fin' => $fechaFin]);
    $rows = $stmtWeeks->fetchAll();

    $semanas = [];
    foreach ($rows as $row) {
        $semana = $row['semana'];
        if (!isset($semanas[$semana])) {
            $semanas[$semana] = ['visitas' => 0, 'descargas' => 0];
        }
        if ($row['tipo'] === 'visita') {
            $semanas[$semana]['visitas'] = (int)$row['total'];
        } else {
            $semanas[$semana]['descargas'] = (int)$row['total'];
        }
    }

    foreach ($semanas as $semana => $valores) {
        $anio = (int)substr($semana, 0, 4);
        $semanaNum = (int)substr($semana, 4, 2);
        $lunes = date('d M', strtotime("{$anio}-W{$semanaNum}-1"));
        $domingo = date('d M', strtotime("{$anio}-W{$semanaNum}-7"));
        $labels[] = "$lunes — $domingo";
        $visitasSemana[] = $valores['visitas'];
        $descargasSemana[] = $valores['descargas'];
    }
}

echo json_encode([
    'visitas_totales' => $visitasTotales,
    'descargas_totales' => $descargasTotales,
    'usuarios_unicos' => $usuariosUnicos,
    'rango' => [
        'inicio' => $fechaInicio,
        'fin' => $fechaFin,
        'dias' => $diasRango,
        'semanal' => $esSemanal
    ],
    'historial_semanal' => [
        'labels' => $labels,
        'visitas' => $visitasSemana,
        'descargas' => $descargasSemana
    ]
], JSON_UNESCAPED_UNICODE);
