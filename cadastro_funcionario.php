<?php
   include "conecta.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionario</title>
   <script src="cep.js"></script>
</head>
<body>

<form name="cadastro_funcionario" action="cadastro_funcionario.php" method="post">

<h3>Cadastra Usuário</h3>

    <label>
       Nome: <input type="text" name="nome"/><br>
    </label>
    <label>
       cpf: <input type="text" name="cpf"/><br>
    </label> 
    <label>
      telefone: <input type="number" name="telefone"/><br>
    </label> 
    <select name ="tipo">
      <option value= "1">entregador</option>
      <option value= "2">cozinheiro</option>                
      <option value= "3">faxineiro</option>
</select> <br>



    <input type="submit" name="botao" value="Enviar"/>
</form> 


<?php
   

   if(isset($_POST['botao'])){

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $tipo = $_POST['tipo'];
   

    $sql = "INSERT INTO funcionario(nome_func, cpf_func, celular_func, id_tipo)
            VALUES ('$nome', '$cpf', '$telefone', '$tipo')";

    $resultado = pg_query($conexao, $sql);

   if($resultado){
      echo "Usuário cadastrado com sucesso!";
      } else{
      echo "Erro no cadastro das informações";
      }
   }
    ?>
</body>

</html>