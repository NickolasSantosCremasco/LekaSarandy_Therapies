<?php
// Usa __DIR__ para garantir que os caminhos dos arquivos estejam corretos.
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';

header('Content-Type: application/json; charset=utf-8');

// Verifica se o usuário está logado e se é um administrador (nível 2)
if (!estaLogado() || $_SESSION['usuario']['nivel'] != 2) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Acesso negado. Você não tem permissão para realizar esta ação.']);
    exit;
}

try {
    // Pega o termo de busca da URL (query string)
    $termo = isset($_GET['q']) ? trim($_GET['q']) : '';

    // Inicia a base da consulta SQL
    $sql = "SELECT id, nome, email, nivel FROM usuarios";

    // Cria um array para as condições do WHERE e um para os parâmetros
    $whereConditions = [];
    $params = [];

    // 1. Primeira condição: Sempre buscar usuários que não sejam administradores
    $whereConditions[] = "nivel != 2";

    // 2. Segunda condição: Se houver um termo de busca, adiciona a condição de pesquisa
    if ($termo !== '') {
        $whereConditions[] = "(nome LIKE :termo OR email LIKE :termo)";
        $params[':termo'] = "%{$termo}%";
    }

    // Se houver condições, anexa-as à consulta SQL usando "AND"
    if (count($whereConditions) > 0) {
        $sql .= " WHERE " . implode(' AND ', $whereConditions);
    }
    
    // Adiciona a ordenação ao final da consulta
    $sql .= " ORDER BY nome ASC";

    // Prepara e executa a consulta
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna os usuários encontrados como JSON
    echo json_encode(['sucesso' => true, 'usuarios' => $usuarios]);

} catch (PDOException $e) {
    // Em caso de qualquer erro com o banco, retorna uma mensagem de erro genérica.
    // Para depuração, você pode querer logar o erro real: error_log($e->getMessage());
    http_response_code(500); // Define o código de erro HTTP para erro de servidor
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao consultar o banco de dados.']);
}
?>