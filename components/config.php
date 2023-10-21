<?php
  $MYSQLDATABASE = $_ENV['railway'];
  $MYSQLHOST = $_ENV['containers-us-west-118.railway.app'];
  $MYSQLPASSWORD = $_ENV['wQjnuMVOknRbYzDQ2MBw'];
  $MYSQLPORT = $_ENV['7529'];
  $MYSQLUSER = $_ENV['root'];

  $conexao = new mysqli($MYSQLDATABASE, $MYSQLHOST, $MYSQLPASSWORD, $MYSQLPORT, $MYSQLUSER);

  if($conexao->error) {
    die("Erro: " . $conexao->error);
  }

  // if($conexao->connect_errno) {
  //   echo "Erro";
  // } else {
  //   echo "Conectado com sucesso";
  // };
