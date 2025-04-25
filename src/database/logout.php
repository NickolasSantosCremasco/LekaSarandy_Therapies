<?php

require_once '../database/auth.php';

//destroi variáveis de sessão
$_SESSION = array();

//se deseja destruir a sessão, os cookies também serão apagados
if(ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']
    );
}

//destrói a sessão
session_destroy();

//redireciona para a página de login
header('Location: login.php');
exit();
?>