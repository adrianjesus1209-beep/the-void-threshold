<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    http_response_code(403);
    echo json_encode(['error' => 'Acceso no autorizado']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

if (!isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['error' => 'No se recibió ningún archivo o hubo un error al subir.']);
    exit;
}

$archivo = $_FILES['archivo'];
$tipo_recurso = $_POST['tipo_recurso'] ?? 'general';

$ext = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
$extensiones_permitidas = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'mp3', 'ogg', 'wav'];

if (!in_array($ext, $extensiones_permitidas)) {
    http_response_code(400);
    echo json_encode(['error' => 'Formato de archivo no permitido.']);
    exit;
}

$uploads_dir_base = __DIR__ . '/../uploads';

if (in_array($tipo_recurso, ['fondo', 'logo_claro', 'logo_oscuro'])) {
    $subcarpeta = 'imagenes';
} elseif (str_starts_with($tipo_recurso, 'foto_')) {
    $subcarpeta = 'galeria';
} elseif (in_array($tipo_recurso, ['feat_0', 'feat_1', 'feat_2'])) {
    $subcarpeta = 'imagenes';
} elseif (in_array($tipo_recurso, ['audio_clic', 'audio_musica'])) {
    $subcarpeta = 'audio';
} else {
    $subcarpeta = 'imagenes';
}

$uploads_dir = $uploads_dir_base . '/' . $subcarpeta;
if (!is_dir($uploads_dir)) {
    mkdir($uploads_dir, 0755, true);
}

$archivos_anteriores = glob($uploads_dir . '/' . $tipo_recurso . '*');
if ($archivos_anteriores) {
    foreach ($archivos_anteriores as $archivo_viejo) {
        if (is_file($archivo_viejo)) {
            @unlink($archivo_viejo);
        }
    }
}

$nuevo_nombre = $tipo_recurso . '.' . $ext;
$destino_absoluto = $uploads_dir . '/' . $nuevo_nombre;
$ruta_relativa = 'uploads/' . $subcarpeta . '/' . $nuevo_nombre;

if (move_uploaded_file($archivo['tmp_name'], $destino_absoluto)) {
    echo json_encode([
        'success' => true,
        'ruta' => $ruta_relativa,
        'mensaje' => 'Archivo subido y reemplazado con éxito'
    ]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error al mover el archivo subido']);
}
