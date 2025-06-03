<?php
require_once '../database/config.php';

if (!isset($_GET['id'])) {
    echo json_encode([]);
    exit;
}

$idUsuario = intval($_GET['id']);
$stmt = $pdo->prepare("SELECT tipo_terapia, data_hora, local, status FROM consultas WHERE usuario_id = ? ");
$stmt->execute([$idUsuario]);
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($consultas);

?>