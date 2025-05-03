<?php 
require_once 'config.php';

//Registrar um novo usuário
function registrarUsuario($nome, $email, $senha) {
    global $pdo;

    //verifica se tem algum campo vazio
    if (empty($nome) || empty($email) || empty($senha) ) {
        return ['sucesso' => false, 'message' => 'Todos os campos são obrigatórios.'];
    };

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['sucesso' => false, 'message' => 'Email inválido!'];
    }

    if (strlen($senha) < 6) {
        return ['sucesso' => false, 'message' => 'A senha deve ter no mínimo 6 caractéres.'];   
    }
    
    //Verifica se o email já existe
    $sql = 'SELECT id FROM usuarios WHERE email = :email';
    $stmt = $pdo-> prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        return ['sucesso' => false, 'message' => 'Email já cadastrado'];
    };

    //Criptografia da Senha
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT, ['cost' => 12]);

    //Inserção no banco
    try {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senhaHash, PDO::PARAM_STR);
        
        $result = $stmt->execute();
        
        return [
            'sucesso' => $result,
            'message'=> $result ? 'Registro Realizado com Sucesso' : 'Erro ao Registrar'
        ];
    } catch (PDOException $e) {
        return['sucesso' => false, 'message' => 'Erro no banco de dados: ' . $e->getMessage()];
    }
    
}

//Função para logar usuário
function logarUsuario($email, $senha) {
    global $pdo;

    //Busca Usuário pelo Email
    $sql = 'SELECT * FROM usuarios WHERE email = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt->rowCount() == 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        //Verifica a senha
        if(password_verify($senha, $usuario['senha'])) {
            //Gera um novo ID de sessão por segurança
            session_regenerate_id(true);
            
            //Remove a senha antes de salvar na sessão
            unset($usuario['senha']);
            $_SESSION['usuario'] = $usuario;
            $_SESSION['ultimo_acesso'] = time();
            return true;
        }
    }
    return false; //credenciais falsas
}

//Verifica se o usuário esta logado
function estaLogado() {
    return isset($_SESSION['usuario']) && (time() - ($_SESSION['ultimo_acesso'] ?? 0)) < 3600; //1h de sessão
}

//Atualiza o tempo de acesso ativo
function renovarSessao() {
    if (isset($_SESSION['usuario'])) {
        $_SESSION['ultimo_acesso'] = time();
    }
}

//Função para redirecionar usuários não logados
function verificarLogin($redirect = '../../index.php') {
    if(!estaLogado()) { 
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        header("Location: $redirect");
        exit();
    }  else {
        renovarSessao();
    }
}

//Deslogar usuário
function logout() {
    $_SESSION = array();
    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}

?>