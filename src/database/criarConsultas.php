<?php

require_once '../database/config.php'; // Arquivo com a conexão PDO
require_once '../database/auth.php';
// Verifica se o usuário está logado
 if(!estaLogado()) {
    header('Location: login.php');
    exit;
 };

 if($_SESSION['usuario']['nivel'] !== 2) {
   die('Apenas adminstradores podem agendar para outros usuários.');
 };

$mensagem = '';
$usuario_id = filter_input(INPUT_POST, 'usuario_id', FILTER_VALIDATE_INT);
$tipoTerapia = htmlspecialchars($_POST['tipoTerapia']);
$dataHora = htmlspecialchars($_POST['dataHora']);
$local = htmlspecialchars($_POST['local']);

//Validação Básica
 if (empty($tipoTerapia) || empty($dataHora) || empty($local)) {
    die('Todos os campos são obrigatórios.');
 }

 if ($usuario_id) {
   die('ID do usuário inválido ou não fornecido.');
 }
 //Conecta ao banco e insere os dados
 try {
    $stmt = $pdo->prepare('INSERT INTO consultas (usuario_id, tipo_terapia, data_hora, local) VALUES (:usuario_id, :tipo_terapia, :data_hora, :local)');
    $stmt->execute([
        ':usuario_id' => $usuario_id,
        ':tipo_terapia' => $tipoTerapia,
        ':data_hora' => $dataHora,
        ':local' => $local,
   
    ]);

    $mensagem = '<div class = "alert alert-success">O seu agendamento foi realizado com sucesso! Espere a confirmação da terapeuta.</div>';
    header('Location: ../pages/perfil.php');
    exit;

 } catch (PDOException $e) {
    echo 'Erro ao agendar consulta: ' . $e->getMessage();
    $mensagem = '<div class = "alert alert-danger">Erro ao agendar consulta.</div>';   
 }


?>