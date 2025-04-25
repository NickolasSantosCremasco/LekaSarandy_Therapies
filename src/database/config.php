<?php
    //Configuração do banco de dados
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'login');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    try {
        $pdo = new PDO("mysql:host".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die('ERRO: Não foi possível conectar. ' . $e->getMessage());
    }
?>