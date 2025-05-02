<?php
    //Configuração do banco de dados
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'sistema_login');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    
    if(session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    
    //Conexão PDO com segurança e performance
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $pdo = new PDO($dsn, 
        DB_USER, 
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //exceções em caso de erro
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //arrays associativos
            PDO::ATTR_EMULATE_PREPARES => false //prepared statements reais
        ]);
    } catch(PDOException $e) {
        http_response_code(500);
        die('ERRO: Não foi possível conectar. ' . $e->getMessage());
    }
?>