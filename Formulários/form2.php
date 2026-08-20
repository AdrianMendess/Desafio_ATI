<?php 
// /** @var mysqli $conexao2 */

// include_once 'conexao.php';
// if (isset($_POST['submit']))
//   {
  
//   $nome = $_POST['nome'];
//   $email = $_POST['email'];
//   $telefone = $_POST['telefone'];
//   $data_nasc = $_POST['data_nascimento'];
//   $cidade = $_POST['cidade'];


//   $query = "INSERT INTO usuarios (nome, email, telefone, data_nascimento, cidade ) VALUES ('$nome','$email', '$telefone', '$data_nasc', '$cidade')";
  
//   $resultado = mysqli_query($conexao2, $query);

//   }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulário | 2</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <div class="box">
      <form action="form2.php" method="post" id="form">
        <!-- campo de entrada de dados. Action é para onde vai os dados-->
        <fieldset>
          <legend><b>Formulário de Clientes</b></legend>
          <br />
          <div class="inputBox">
            <input
              type="text"
              name="nome"
              id="nome"
              class="inputUser"
              required
            />
            <label for="nome" class="labelInput">Nome Completo</label>

          </div>
          <br /><br />
          <div class="inputBox">
            <input
              type="text"
              name="email"
              id="email"
              class="inputUser"
              required
            />
            <label for="email" class="labelInput">Email</label>

          </div>
          <br /><br />
          <div class="inputBox">
            <input
              type="tel"
              name="telefone"
              id="telefone"
              class="inputUser"
              required
            />
            <label for="telefone" class="labelInput">Telefone</label>

          <br>
            <label for="data_nascimento"><b>Data de Nascimento:</b></label>
            <input
              type="date"
              name="data_nascimento"
              id="data_nascimento"
              required
            />

          <br /><br /><br>
          <div class="inputBox">
            <input
              type="text"
              name="cidade"
              id="cidade"
              class="inputUser"
              required
            />
            <label for="cidade" class="labelInput">Cidade</label>
          </div>
          <br />
          
          <input type="submit" name="submit" id="submit" />
        </fieldset>
      </form>
    </div>
  </body>
    <script src="script.js"></script>
</html>