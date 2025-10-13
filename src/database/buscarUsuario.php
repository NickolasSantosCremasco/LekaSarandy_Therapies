    <?php
    require_once __DIR__ . '/../database/auth.php';
    require_once __DIR__ . '/../database/config.php';

    header('Content-Type: application/json; charset=utf-8');

    if (!estaLogado() || $_SESSION['usuario']['nivel'] != 2) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Acesso negado']);
        exit;
    }

    $termo = isset($_GET['q']) ? trim($_GET['q']) : '';

    $sql = "SELECT id, nome, email, nivel FROM usuarios WHERE nivel != 2";
    $params = [];

    if ($termo !== '') {
        $sql .= " AND nome LIKE :termo";
        $params[':termo'] = "%{$termo}%";
    }

    $sql .= " ORDER BY nome ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['sucesso' => true, 'usuarios' => $usuarios]);
    ?>