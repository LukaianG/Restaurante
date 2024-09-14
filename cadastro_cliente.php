<?php
   include "conecta.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <script src="cep.js"></script>
</head>
<body>

<form name="cadastro_cliente" action="cadastro_cliente.php" method="post">

<h3>Cadastra Usuário</h3>

    <label>
       Nome: <input type="text" name="nome"/><br>
    </label>
    <label>
       Email: <input type="text" name="email"/><br>
    </label>
    <label>
       senha: <input type="password" name="senha"/><br>
    </label> 
    <label>
      telefone: <input type="number" name="telefone"/><br>
    </label> 
      
    <label>
      CEP: <input id="cep" type="number" name="cep"><br>
   </label>  
   <label>
       logradouro: <input id="logradouro" type="text" name="rua"/><br>
    </label>
    <label>
      numero: <input type="number" name="numero"><br>
   </label>
   <label>
      comlemento: <input type="text" name="complemento"><br>
   </label>
    <label>
       bairro: <input id="bairro" type="text" name="bairro"/><br>
    </label>
    <label>
       cidade: <input id="cidade" type="text" name="cidade"/><br>
    </label>
    <label>
       estado: <input id="estado" type="text" name="estado"/><br>
    </label>


    <input type="submit" name="botao" value="Enviar"/>
</form> 


<?php
   

   if(isset($_POST['botao'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = ("INSERT INTO cliente(cep, telefone, logradouro, complemento, email_cliente, nome_cliente, senha_cliente, num_rua, bairro, cidade, estado_cliente)
            VALUES ('$cep' , '$telefone', '$logradouro', '$complemento', '$email', '$nome', '$senha', '$numero', '$bairro', '$cidade', '$estado')");

    $resultado = pg_query($conexao, $sql);

   if($resultado){
      echo "Usuário cadastrado com sucesso!";
      } else{
      echo "Erro no cadastro das informações" . pg_last_error($conexao);;
      }
   }
    ?>
</body>

</html>

