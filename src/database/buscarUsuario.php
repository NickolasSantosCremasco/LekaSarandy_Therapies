<?php

// Usa __DIR__ para garantir que os caminhos dos arquivos estejam corretos.
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';

// Verifica se o usuário está logado e se é um administrador (nível 2)
if (!estaLogado() || $_SESSION['usuario']['nivel'] != 2) {
    http_response_code(403);
    echo json_encode(['sucesso' => false, 'mensagem' => 'Acesso negado. Você não tem permissão para realizar esta ação.']);
    exit;
}

try {
     // Pega o termo de busca da URL (query string)
    $termo = isset($_GET['q']) ? trim($_GET['q']) : '';

    // Inicia a base da consulta SQL
    $sql = "SELECT id, nome, email, nivel FROM usuarios";

    $whereConditions = [];
    $params = [];

    // 1. Primeira condição: Sempre buscar usuários que não sejam administradores
    $whereConditions[] = "nivel != 2";

    // 2. Segunda condição: Se houver um termo de busca...
    if ($termo !== '') {
        $whereConditions[] = "(nome LIKE :nome_termo OR email LIKE :email_termo)";
        
        $searchTermLike = "%{$termo}%";
        $params[':nome_termo'] = $searchTermLike;
        $params[':email_termo'] = $searchTermLike; 
    }

    // Se houver condições, anexa-as à consulta SQL
    if (count($whereConditions) > 0) {
        $sql .= " WHERE " . implode(' AND ', $whereConditions);
    }
    
    // Adiciona a ordenação
    $sql .= " ORDER BY nome ASC";

    // Prepara e executa a consulta
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params); // ✅ Agora o número de parâmetros bate com os placeholders
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retorna os usuários encontrados como JSON
    echo json_encode(['sucesso' => true, 'usuarios' => $usuarios]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'sucesso' => false, 
        'mensagem' => 'Erro ao consultar o banco de dados.',
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'sucesso' => false, 
        'mensagem' => 'Erro interno do servidor.',
    ]);
}
?>