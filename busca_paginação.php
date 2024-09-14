<?php 
session_start();
include "conecta.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca de Produtos</title>
</head>
<body>

    <form name="busca" action="busca_paginação.php" method="post">
        <h3>Busca</h3>
        <label>
            Digite o que deseja buscar: <input type="text" name="resposta"/><br>
        </label>
        <select name="filtro">
            <option value="nome_prod">Nome</option>
            <option value="desc_prod">Descrição</option>
        </select>
        <input type="submit" value="Buscar" name="entrar"><br>
    </form>

    <?php
    $quant = 2; 

    if (isset($_POST['entrar'])) {
        $_SESSION['resposta'] = $_POST['resposta'];
        $_SESSION['filtro'] = $_POST['filtro'];
    }

    if (isset($_GET['pg'])) {
        $pg = $_GET['pg'];
    } else {
        $pg = 0;
    }

    $inicio = $pg * $quant;

    if (isset($_POST['entrar']) || isset($_GET['pg'])) {
        $resposta = $_SESSION['resposta'];
        $filtro = $_SESSION['filtro'];

        $sql = "SELECT * FROM cardapio WHERE $filtro iLIKE '%$resposta%'";
        $resultado = pg_query($conexao, $sql);
        $linhas = pg_num_rows($resultado);

        $sql_pagina = "SELECT * FROM cardapio
                       WHERE $filtro iLIKE '%$resposta%'
                       LIMIT $quant OFFSET $inicio";

        $resultado_pagina = pg_query($conexao, $sql_pagina);

        echo "Foram encontrados " . $linhas . " resultados!";
        echo "<form action='editar_excluir_cardapio.php' method='post'>";
        echo "<table border='2'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>Status</th>";
        echo "<th>Descrição</th>";
        echo "<th>Valor</th>";
        echo "<th>Quantidade</th>";
        echo "<th>ID_Cat</th>";
        echo "<th>Editar</th>";
        echo "<th>Excluir</th>";
        echo "</tr>";

        for ($i = 0; $i < $quant && $registro = pg_fetch_array($resultado_pagina); $i++) {
            echo "<tr>";
            echo "<td> " . $registro['id_produto'] . "</td>";
            echo "<td> " . $registro['nome_prod'] . "</td>";
            echo "<td> " . $registro['status_prod'] . "</td>";
            echo "<td> " . $registro['desc_prod'] . " </td>";
            echo "<td> " . $registro['valor_prod'] . " </td>";
            echo "<td> " . $registro['quant_prod'] . " </td>";
            echo "<td> " . $registro['id_cat'] . " </td>";
            echo "<td><button name='editar' value='" . $registro[0] . "'>Editar</button></td>";
            echo "<td><button name='excluir' value='" . $registro[0] . "'>Excluir</button></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</form>";
        echo "<br>";

        $numeros = ceil(pg_num_rows($resultado)/$quant);

        if($pg == 0){
            echo "<< Anterior ";
        }
        else{
            $index = $pg - 1;
            echo "<a href='busca_paginação.php?pg=$index'>" . "<< Anterior " . "</a>";
        }

        for($i=0; $i < $numeros; $i++){
            if($pg == $i)
                echo $i + 1  . " | ";
            else
                echo "<a href='busca_paginação.php?pg=$i'>" . $i + 1 . "</a> | ";
        }
        
        if($pg == $numeros - 1){
            echo " Próximo >>";
        } else{
            $index = $pg + 1;
            echo "<a href='busca_paginação.php?pg=$index'>" . " Próximo >> " . "</a>";
        }
    }
    ?>
</body>
</html>
