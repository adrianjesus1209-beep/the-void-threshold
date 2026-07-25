<?php
session_start();

require_once __DIR__ . '/../api/db_conexion.php';

$token_recibido = $_GET['t'] ?? '';
$token_db = obtenerTokenAdmin();

if (!$token_db || $token_recibido !== $token_db) {
    header('Location: ../index.php');
    exit;
}

$contenido = file_get_contents(__DIR__ . '/index.html');
echo $contenido;
