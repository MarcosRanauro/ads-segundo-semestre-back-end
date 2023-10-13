<?php
session_start();
// print_r($_SESSION);

require_once('../components/tokenFunc.php');

if(!isset($_SESSION['usu_login']) == true && !isset($_SESSION['usu_senha']) == true) {
  unset($_SESSION['usu_login']);
  unset($_SESSION['usu_senha']);
  header('Location: Login.php');
}

$token_key = 'temp_token';
if(!verificarToken($token_key)) {
  unset($_SESSION['autenticado_2fa']);
  unset($_SESSION['usu_cpf']);
  header('Location: Login.php');
}

if(!isset($_SESSION['autenticado_2fa'])) {
  unset($_SESSION['autenticado_2fa']);
  unset($_SESSION['usu_cpf']);
  header('Location: 2ffa.php');
}

$logado_login = $_SESSION['usu_login'];
$logado_senha = $_SESSION['usu_senha'];

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
  <title>Perfil</title>
</head>

<body>
  Bem vindo ao perfil de Usúario, <?php echo $logado_login; ?> <br>
  Nome: <?php echo $logado_nome; ?><br>
  Sexo: <?php echo $logado_sexo; ?><br>
  Data de Nascimento: <?php echo $logado_dataNasc; ?> <br>
  Nome da Mãe: <?php echo $logado_nomeMaterno; ?> <br>
  CPF: <?php echo $logado_cpf; ?> <br>
  Celular: <?php echo $logado_celular; ?> <br>
  Telefone Fixo: <?php echo $logado_telefoneFixo; ?> <br>
  Endereço: <?php echo $logado_endereco; ?> <br>
  <a href="../index.php">Home</a>
  <a href="../components/sair.php">Sair</a>
</body>

</html>