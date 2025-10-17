<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';

header('Content-Type: application/json; charset=utf-8');

if (!estaLogado() || $_SESSION['usuario']['nivel'] != 2) {
    echo json_encode(['sucesso' => false, 'erro' => 'Acesso negado.']);
    exit;
}

$consulta_id = filter_input(INPUT_POST, 'consulta_id', FILTER_VALIDATE_INT);
$dataHora = htmlspecialchars($_POST['dataHora'] ?? '');
$local = htmlspecialchars($_POST['local'] ?? '');

if (!$consulta_id || empty($dataHora) || empty($local)) {
    echo json_encode(['sucesso' => false, 'erro' => 'Dados inválidos ou incompletos.']);
    exit;
}

try {
    // Atualiza a data, o local e redefine o status para "Agendando"
    $stmt = $pdo->prepare("UPDATE consultas SET data_hora = :data_hora, local = :local, status = 'Agendando' WHERE id = :id");
    $stmt->execute([
        ':data_hora' => $dataHora,
        ':local' => $local,
        ':id' => $consulta_id
    ]);

    echo json_encode(['sucesso' => true, 'mensagem' => 'Consulta reagendada com sucesso!']);
} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'erro' => 'Erro ao atualizar a consulta no banco de dados.']);
}
?>