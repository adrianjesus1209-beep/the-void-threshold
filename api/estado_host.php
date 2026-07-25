<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: ' . (isset($_SERVER['HTTP_HOST']) ? 'http://' . $_SERVER['HTTP_HOST'] : '*'));

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    http_response_code(403);
    echo json_encode(['error' => 'Acceso no autorizado']);
    exit;
}

$nombre_host = $_SERVER['SERVER_NAME'] ?? 'Servidor Desconocido';
if ($nombre_host === 'localhost' || $nombre_host === '127.0.0.1') {
    $servidor_display = 'Localhost (XAMPP)';
} else {
    $servidor_display = $nombre_host;
}

$version_php = 'v' . phpversion();

$carpetas_excluidas = ['.git', 'node_modules', '.svn', '__pycache__', '.cache', 'vendor'];

function obtener_tamano_directorio($dir, $excluidas) {
    $size = 0;
    if (!is_dir($dir)) return $size;
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS | RecursiveDirectoryIterator::FOLLOW_SYMLINKS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ($iterator as $file) {
        if ($file->isDir()) {
            $nombre = basename($file->getPathname());
            if (in_array($nombre, $excluidas, true)) {
                $iterator->excludeChildren();
                continue;
            }
        }
        if ($file->isFile()) {
            $size += $file->getSize();
        }
    }
    return $size;
}

$raiz_proyecto = __DIR__ . '/..';
$bytes_usados = obtener_tamano_directorio($raiz_proyecto, $carpetas_excluidas);
$mb_usados = round($bytes_usados / 1048576, 2);

echo json_encode([
    'host' => $servidor_display,
    'version_php' => $version_php,
    'mb_usados' => $mb_usados
], JSON_UNESCAPED_UNICODE);
