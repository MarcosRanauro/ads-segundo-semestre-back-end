<?php
  $MYSQLHOST = $_ENV['containers-us-west-118.railway.app'];
  $MYSQLUSER = $_ENV['root'];
  $MYSQLPASSWORD = $_ENV['wQjnuMVOknRbYzDQ2MBw'];
  $MYSQLDATABASE = $_ENV['railway'];
  $MYSQLPORT = $_ENV['7529'];
  
  $conexao = new mysqli($MYSQLHOST, $MYSQLUSER, $MYSQLPASSWORD, $MYSQLDATABASE, $MYSQLPORT);  

  if($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
  }
?>
