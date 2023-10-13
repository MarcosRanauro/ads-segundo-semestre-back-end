<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autenticação</title>
  <script>
    function formatCPF(input) {
      // Remove qualquer caractere que não seja número
      var value = input.value.replace(/\D/g, '');

      // Limita a 11 caracteres
      if (value.length > 11) {
        value = value.substring(0, 11);
      }

      // Formate o CPF com os pontos e traço
      if (value.length >= 3) {
        value = value.substring(0, 3) + '.' + value.substring(3);
      }
      if (value.length >= 7) {
        value = value.substring(0, 7) + '.' + value.substring(7);
      }
      if (value.length >= 11) {
        value = value.substring(0, 11) + '-' + value.substring(11);
      }

      // Permite somente números no campo
      input.value = value;
    }
  </script>
</head>
<body>
  <h1>Autenticação de 2 fatores</h1>
  <form action="teste2ffa.php" method="POST">
    <label for="cpf">Digite o seu cpf:</label>
    <input type="text" name="cpf" id="cpf" oninput="formatCPF(this)">
    <input type="submit" name="submit" value="Enviar">
    <a href="Login.php">Voltar</a>
</body>
</html>