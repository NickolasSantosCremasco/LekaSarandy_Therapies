<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';


header('Content-Type: application/json; charset=utf-8');

if (!estaLogado() || $_SESSION['usuario']['nivel'] != 2) {
    echo json_encode(['sucesso' => false, 'erro' => 'Acesso negado.']);
    exit;
}

$consulta_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$consulta_id) {
    echo json_encode(['sucesso' => false, 'erro' => 'ID da consulta inválido.']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM consultas WHERE id = :id");
    $stmt->execute([':id' => $consulta_id]);
    $consulta = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($consulta) {
        echo json_encode(['sucesso' => true, 'consulta' => $consulta]);
    } else {
        echo json_encode(['sucesso' => false, 'erro' => 'Consulta não encontrada.']);
    }
} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'erro' => 'Erro no banco de dados.']);
}
?>