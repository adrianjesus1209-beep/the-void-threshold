<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: ' . (isset($_SERVER['HTTP_HOST']) ? 'http://' . $_SERVER['HTTP_HOST'] : '*'));

$config_path = __DIR__ . '/config.json';

if (file_exists($config_path)) {
    echo file_get_contents($config_path);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Configuración no encontrada']);
}
