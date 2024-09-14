<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categoria</title>
</head>
<body>
    <form name="cadastro_categoria.php" action="cadastro_categoria.php" method="post">
        <label>Nome da categoria: <input type="text" name="nome"/><label>
        <br>
        <label>
            Descrição: <input type="text" name="descricao"/></label>
            <br>
    <input type="submit" name="botao" value="enviar">
    </form>

</body>
</html>

<?php
    include "conecta.php";

if(isset($_POST['botao'])){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    
   

    $sql = "INSERT INTO categoria (nome_cat, desc_cat)
            VALUES ('$nome', '$descricao')";

    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "cadastro realizado com sucesso";
    }else{
        echo "erro!";
    }
}