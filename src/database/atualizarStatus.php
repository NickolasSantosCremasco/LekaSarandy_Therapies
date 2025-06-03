    <?php

    require_once '../database/config.php';

    header('Content-Type: application/json');
    $consultaId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $novoStatus = htmlspecialchars($_POST['status']);

    //Validação básica
    if (!$consultaId || !in_array($novoStatus, ['confirmada', 'cancelada'])) {
        http_response_code(400);
        echo json_encode(['erro' => 'Dados Inválidos']);
        exit;
    }

    try {
        $stmt = $pdo->prepare('UPDATE consultas SET status = :status WHERE id = :id');
        $stmt->execute([
            ':status' => $novoStatus,
            ':id' => $consultaId
        ]);
        echo json_encode(['sucesso' => true]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['erro' => 'Erro ao atualizar: ' . $e->getMessage()]);
    }

    ?>