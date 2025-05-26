<?php
session_start();

//destroi todas as variáveis de sessão
$_SESSION = array();

//Apagar os Cookies de sessão também
if(ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
);
}

//destroi sessão
session_destroy();

//Redireciona para a página de login ou início
header("Location: ../pages/login.php");
exit;
?>