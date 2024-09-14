<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categoria</title>
</head>
<body>
    <form name="cadastro_status.php" action="cadastro_status.php" method="post">
        <label>Status do pedido: <input type="text" name="status"/><label>
        <br>
      
    <input type="submit" name="botao" value="enviar">
    </form>

</body>
</html>

<?php
    include "conecta.php";

if(isset($_POST['botao'])){
    $status = $_POST['status'];

    $sql = "INSERT INTO status_ped (nome_status)
            VALUES ('$status')";

    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "cadastro realizado com sucesso";
    }else{
        echo "erro!";
    }
}