<?php
try {
    $hostname = $_ENV['containers-us-west-118.railway.app'];
    $username = $_ENV['root'];
    $password = $_ENV['wQjnuMVOknRbYzDQ2MBw'];
    $database = $_ENV['railway'];
    $port = $_ENV['7529'];

    $dsn = "mysql:host=$hostname;dbname=$database;port=$port";
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    $conexao = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Agora você está conectado ao banco de dados e pode executar consultas usando o objeto $conexao
?>
