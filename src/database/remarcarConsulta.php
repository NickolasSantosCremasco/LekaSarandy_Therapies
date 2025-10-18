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
    $tipoTerapia = htmlspecialchars($_POST['tipoTerapia'] ?? ''); 


    if (!$consulta_id || empty($dataHora) || empty($local) || empty($tipoTerapia)) { 
        echo json_encode(['sucesso' => false, 'erro' => 'Dados inválidos ou incompletos.']);
        exit;
    }

    try {
        // Query de atualização - ajuste se tipoTerapia precisar ser atualizado
        $stmt = $pdo->prepare("UPDATE consultas SET data_hora = :data_hora, local = :local, tipo_terapia = :tipo_terapia, status = 'Agendando' WHERE id = :id");
        $stmt->execute([
            ':data_hora' => $dataHora,
            ':local' => $local,
            ':tipo_terapia' => $tipoTerapia,
            ':id' => $consulta_id
            
        
        ]);

        // 🟢 CORRIGIDO: Adicionado o comando echo
        echo json_encode(['sucesso' => true, 'mensagem' => 'Consulta reagendada com sucesso!']);

    } catch (PDOException $e) {
        http_response_code(500); // Boa prática definir o código de erro
        echo json_encode(['sucesso' => false, 'erro' => 'Erro ao atualizar a consulta no banco de dados.']);
    }
    ?>