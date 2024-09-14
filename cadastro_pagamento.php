<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forma de pagamento</title>
</head>
<body>
    <form name="cadastro_pagamento.php" action="cadastro_pagamento.php" method="post">
        <label>Forma de pagamento: <input type="text" name="pag"/><label>
        <br>
    
    <input type="submit" name="botao" value="enviar">
    </form>

</body>
</html>

<?php
    include "conecta.php";
    if (!$conexao) {
        die("Falha na conexão: " . pg_last_error());
    }

    if (isset($_POST['botao'])) {
        if (isset($_POST['pag']) && !empty($_POST['pag'])) {
            $pag = $_POST['pag'];

            $sql = "INSERT INTO pagamento (nome_pag) VALUES ('$pag')";
            $resultado = pg_query($conexao, $sql);

            if ($resultado) {
                echo "cadastro realizado com sucesso";
            } else {
                echo "erro: " . pg_last_error($conexao);
            }
        } else {
            die("O campo 'Forma de pagamento' está vazio.");
        }
    }
?>
