<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categoria</title>
</head>
<body>
    <form name="cadastro_tipo.php" action="cadastro_tipo.php" method="post">
        <label>Tipo funcionario: <input type="text" name="tipo"/><label>
        <br>
      
    <input type="submit" name="botao" value="enviar">
    </form>

</body>
</html>

<?php
    include "conecta.php";

if(isset($_POST['botao'])){
    $tipo = $_POST['tipo'];
    
    
   

    $sql = "INSERT INTO tipo (nome_tipo)
            VALUES ('$tipo')";

    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "cadastro realizado com sucesso";
    }else{
        echo "erro!";
    }
}