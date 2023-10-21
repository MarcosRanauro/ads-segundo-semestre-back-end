<?php
  $dbHost = $_ENV['Telefonia.mysql.database.railway.app'];
  $dbUserName = $_ENV['root'];
  $dbPassword = $_ENV['1234'];
  $dbName = "Telefonia";
  $dbPort = $_ENV['3306'];

  $conexao = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName, $dbPort);

  if($conexao->error) {
    die("Erro: " . $conexao->error);
  }

  // if($conexao->connect_errno) {
  //   echo "Erro";
  // } else {
  //   echo "Conectado com sucesso";
  // };
?>