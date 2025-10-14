<?php
// 🟢 CORREÇÃO: Usa __DIR__ para garantir que os arquivos sejam encontrados na mesma pasta.
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';

header('Content-Type: application/json; charset=utf-8');

// Inicia a sessão se ainda não foi iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!estaLogado() || $_SESSION['usuario']['nivel'] != 2) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Acesso negado']);
    exit;
}

$termo = isset($_GET['q']) ? trim($_GET['q']) : '';

$sql = "SELECT id, nome, email, nivel FROM usuarios WHERE nivel != 2";
$params = [];

if ($termo !== '') {
    // Busca por nome OU email para uma pesquisa mais completa
    $sql .= " AND (nome LIKE :termo OR email LIKE :termo)";
    $params[':termo'] = "%{$termo}%";
}

$sql .= " ORDER BY nome ASC";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['sucesso' => true, 'usuarios' => $usuarios]);
} catch (PDOException $e) {
    // Em caso de erro de banco, retorna um JSON de erro
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao consultar o banco de dados.']);
}
?>