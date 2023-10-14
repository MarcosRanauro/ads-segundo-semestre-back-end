<?php
session_start();
// print_r($_SESSION);

if (!isset($_SESSION['usu_login']) == true && !isset($_SESSION['usu_senha']) == true && !isset($_SESSION['tipo_usuario']) == 'master') {
  unset($_SESSION['usu_login']);
  unset($_SESSION['usu_senha']);
  unset($_SESSION['tipo_usuario']);
  header('Location: Login.php');
}

$logado_login = $_SESSION['usu_login'];
$logado_senha = $_SESSION['usu_senha'];

$required_role = 'master';

if ($_SESSION['role'] !== $required_role) {
  header('Location: perfil.php');
}

include_once('../components/config.php');

$sql = "SELECT * FROM usuarios WHERE usu_login = '$logado_login' AND usu_senha = '$logado_senha'";
$result = $conexao->query($sql);

if ($result && $result->num_rows > 0) {
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

$sql_dadosDB = "SELECT * FROM usuarios ORDER BY usu_nome";
$result_dadosDB = $conexao->query($sql_dadosDB);
print_r($result_dadosDB);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <title>Master</title>
</head>

<body>
  <div class="m-5">
    <h1>Perfil Master</h1>
    <div>
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
      <a href="../components/sair.php">Sair</a>
    </div>
    <div>
      <table class="table table-success table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Genero</th>
            <th scope="col">Nome Materno</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone Celular</th>
            <th scope="col">Telefone</th>
            <th scope="col">Endereço</th>
            <th scope="col">Login</th>
            <th scope="col">Senha</th>
            <th scope="col">Confirmação de senha</th>
            <th scope="col">Tipo de Usuario</th>
            <th scope="col">...</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($user_data = mysqli_fetch_assoc($result_dadosDB)) {
              echo "<tr>";
              echo "<td>".$user_data['id']."</td>";
              echo "<td>".$user_data['usu_nome']."</td>";
              echo "<td>".$user_data['usu_dataNasc']."</td>";
              echo "<td>".$user_data['usu_sexo']."</td>";
              echo "<td>".$user_data['usu_nomeMaterno']."</td>";
              echo "<td>".$user_data['usu_cpf']."</td>";
              echo "<td>".$user_data['usu_celular']."</td>";
              echo "<td>".$user_data['usu_telefoneFixo']."</td>";
              echo "<td>".$user_data['usu_endereco']."</td>";
              echo "<td>".$user_data['usu_login']."</td>";
              echo "<td>".$user_data['usu_senha']."</td>";
              echo "<td>".$user_data['usu_confirmarSenha']."</td>";
              echo "<td>".$user_data['tipo_usuario']."</td>";
              echo "<td>Ações</td>";
              echo "</tr>";
            }

          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>