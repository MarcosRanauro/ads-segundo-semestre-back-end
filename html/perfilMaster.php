<?php
session_start();
// print_r($_SESSION);
if(!isset($_SESSION['usu_login']) == true && !isset($_SESSION['usu_senha']) == true && !isset($_SESSION['tipo_usuario']) == 'master') {
  unset($_SESSION['usu_login']);
  unset($_SESSION['usu_senha']);
  unset($_SESSION['tipo_usuario']);
  header('Location: Login.php');
}


$logado_login = $_SESSION['usu_login'];
$logado_senha = $_SESSION['usu_senha'];

$required_role = 'master';

if($_SESSION['role'] !== $required_role) {
  header('Location: perfil.php');
}

include_once('../components/config.php');

$sql = "SELECT * FROM usuarios WHERE usu_login = '$logado_login' AND usu_senha = '$logado_senha'";
$result = $conexao->query($sql);

if($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $logado_nome = $row['usu_nome'];
  $logado_dataNasc = $row['usu_dataNasc'];
  $logado_sexo = $row['usu_sexo'];
  $logado_nomeMaterno = $row['usu_nomeMaterno'];
  $logado_cpf = $row['usu_cpf'];
  $logado_celular = $row['usu_celular'];
  $logado_telefoneFixo = $row['usu_telefoneFixo'];
  $logado_endereco = $row['usu_endereco'];
} else {
  $logado_nome = "Não encontrado";
  $logado_dataNasc = "Não encontrado";
  $logado_sexo = "Não encontrado";
  $logado_nomeMaterno = "Não encontrado";
  $logado_cpf = "Não encontrado";
  $logado_celular = "Não encontrado";
  $logado_telefoneFixo = "Não encontrado";
  $logado_endereco = "Não encontrado";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Master</title>
</head>
<body>
  <h1>Perfil Master</h1>
  Bem vindo ao perfil de Usúario Master, <?php echo $logado_login; ?> <br>
  Nome: <?php echo $logado_nome; ?><br>
  Sexo: <?php echo $logado_sexo; ?><br>
  Data de Nascimento: <?php echo $logado_dataNasc; ?> <br>
  Nome da Mãe: <?php echo $logado_nomeMaterno; ?> <br>
  CPF: <?php echo $logado_cpf; ?> <br>
  Celular: <?php echo $logado_celular; ?> <br>
  Telefone Fixo: <?php echo $logado_telefoneFixo; ?> <br>
  Endereço: <?php echo $logado_endereco; ?> <br>
  <a href="../index.php">Home</a>
  <a href="sair.php">Sair</a>
</body>
</html>