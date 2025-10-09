<?php
require_once '../database/config.php'; 
require_once '../database/auth.php';

if (!estaLogado()) {
    header('Location: ../pages/login.php');
    exit;
}

try {
    $usuario_id = $_SESSION['usuario']['id'];
    $senha_atual = $_POST['senha_atual'] ?? '';
    $nova_senha = $_POST['nova_senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';
    
    // Verificações básicas
    if (empty($senha_atual) || empty($nova_senha) || empty($confirmar_senha)) {
        header('Location: ../pages/perfil.php?msg=Preencha todos os campos.');
        exit;
    }
    
    if ($nova_senha !== $confirmar_senha) {
        header('Location: ../pages/perfil.php?msg=As senhas não coincidem.');
        exit;
    }
    
    // Pegar a senha atual do banco
    $sql = 'SELECT senha FROM usuarios WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario_id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$usuario || !password_verify($senha_atual, $usuario['senha'])) {
        header('Location: ../pages/perfil.php?msg=Senha atual incorreta.');
        exit;
    }

    // Verificação segura para garantir que a nova senha é diferente da atual
    if (password_verify($nova_senha, $usuario['senha'])) { 
        header('Location: ../pages/perfil.php?msg=Erro: A nova senha não pode ser igual à senha atual.');
        exit;
    }

    // Atualização da nova senha
    $nova_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
    $sql_update = 'UPDATE usuarios SET senha = ? WHERE id = ?';
    $stmt_update = $pdo->prepare($sql_update);
    
    if ($stmt_update->execute([$nova_hash, $usuario_id])) {
        header('Location: ../pages/perfil.php?msg=Sucesso: Senha alterada com sucesso!');
        exit;
    } else {
        header('Location: ../pages/perfil.php?msg=Erro: Não foi possível alterar a senha. Tente novamente.');
        exit;
    }
} catch (PDOException $e) {

    header('Location: ../pages/perfil.php?msg=Erro: Ocorreu um problema no servidor. Tente mais tarde.');
    exit;
}
?>