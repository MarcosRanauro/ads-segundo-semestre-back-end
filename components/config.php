<?php
  $DB_HOST = $_ENV['Telefonia.mysql.database.railway.app'];
  $DB_USERNAME = $_ENV['root'];
  $DB_SENHA = $_ENV[''];
  $DB_DATABASE = $_ENV['Telefonia'];
  $DB_PORT = $_ENV['3306'];

  $conexao = new mysqli($DB_HOST, $DB_USERNAME, $DB_SENHA, $DB_DATABASE, $DB_PORT);

  if($conexao->error) {
    die("Erro: " . $conexao->error);
  }

  // if($conexao->connect_errno) {
  //   echo "Erro";
  // } else {
  //   echo "Conectado com sucesso";
  // };
?>