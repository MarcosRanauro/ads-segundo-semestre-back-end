<?php
  $MYSQLDATABASE = $_ENV['railway'];
  $MYSQLHOST = $_ENV['containers-us-west-172.railway.app'];
  $MYSQLPASSWORD = $_ENV['YtFcUv0C5FIRk7qhdMkN'];
  $MYSQLPORT = $_ENV['7658'];
  $MYSQLUSER = $_ENV['root'];

  $conexao = new mysqli($MYSQLHOST, $MYSQLUSER, $MYSQLPASSWORD, $MYSQLDATABASE, $MYSQLPORT);

  if($conexao->error) {
    die("Erro: " . $conexao->error);
  }

  // if($conexao->connect_errno) {
  //   echo "Erro";
  // } else {
  //   echo "Conectado com sucesso";
  // };
