<?php 
include "conecta.php" 
?>
<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Busca de Produtos</title>
    </head>
    <body>

        <form name="busca" action="busca.php" method="post">

            <label>
               Procurar Comida: <input type="text" name="resposta"/><br>
            </label>
            <input type="submit" value="Entrar"  name="entrar"><br>
        </form>


        <?php
        if(isset($_POST['entrar'])){
        $resposta = $_POST['resposta'];

        $sql = "SELECT * FROM cardapio WHERE nome_prod iLIKE '%$resposta%'";
        $resultado = pg_query($conexao, $sql);
        $linhas = pg_num_rows($resultado);

        echo "Foram encontrados " . $linhas . " resultados!";
        echo "<form action='editar_excluir_cardapio.php' method='post'>";
        echo "<table border='2'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>Status</th>";
        echo "<th>Descrição</th>";
        echo "<th>valor</th>";
        echo "<th>Quantidade</th>";
        echo "<th>ID_Cat</th>";
        echo "<th>Editar</th>";
        echo "<th>Excluir</th>";
        echo "</tr>";
        
        for($i = 0; $i < $linhas; $i++){
            $registro = pg_fetch_array($resultado);

            echo "<tr>";
            echo "<td> " . $registro['id_produto'] . "</td>";
            echo "<td> " . $registro['nome_prod'] . "</td>";
            echo "<td> " . $registro['status_prod'] . "</td>";
            echo "<td> " . $registro['desc_prod'] . " </td>";
            echo "<td> " . $registro['valor_prod'] . " </td>";
            echo "<td> " . $registro['quant_prod'] . " </td>";
            echo "<td> " . $registro['id_cat'] . " </td>";
            echo "<td><button name='editar'value='$registro[0]'>Editar</button></td>";
            echo "<td><button name='excluir'value='$registro[0]'>Excluir</button></td>";
            echo "</tr>";
        }  
        echo "</table>";
        echo "</form>";
        }
        ?>
    </body>
</html>