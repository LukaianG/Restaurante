<?php
    include "conecta.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
</head>
<body> 
    <form name="cadastro_pedido.php" action="cadastro_pedido.php" method="post">
        <label>
            ID do cliente: <input type="number" name="id_cliente">  
        </label><br>

       
        <label>
            ID do funcionário: <input type="number" name="id_func">
        </label><br>

        <label>
            ID do produto: <input type="number" name="id_prod">
        </label><br>


<?php
        echo"Status do pedido:
        <select name='status'>";

            $sql_status = "SELECT * FROM status_ped ";
            $resultado_status = pg_query($conexao, $sql_status);
            $linhas = pg_num_rows($resultado_status);
            for($i = 0; $i < $linhas; $i++){
                $registro_status = pg_fetch_array($resultado_status);
                echo "<option value='$registro_status[1]'>$registro_status[0]</option>";
            }

        echo"</select><br>";

echo"Forma de pagamento:
        <select name='pagamento'>";

        
        $sql_pag = "SELECT * FROM pagamento";
        $resultado_pag = pg_query($conexao, $sql_pag);
        $linhas = pg_num_rows($resultado_pag);
        for($i = 0; $i < $linhas; $i++){
    $registro_pag = pg_fetch_array($resultado_pag);
    echo "<option value='$registro_pag[0]'>$registro_pag[1]</option>";
        }
            
        echo"</select><br>";

?>


        <input type="submit" name="botao" value="Enviar">
    </form>
</body>
</html>

<?php


$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : 0;
$local_entrega = '';

if($id_cliente){
    $sql_ent = "SELECT * FROM cliente WHERE id_cliente = $id_cliente";
    $resultado = pg_query($conexao, $sql_ent);

    if($resultado) {
        $row = pg_fetch_assoc($resultado);
        $local_entrega = $row['logradouro'] . " " . $row['complemento'] . " " . $row['num_rua'] . ", " . $row['bairro'] . ", " . $row['cidade'];
    }
}


$id_prod = isset($_POST['id_prod']) ? $_POST['id_prod'] : 0;
$valor_ped = '';

// Se o ID do produto for fornecido, busque o valor do produto
if ($id_prod) {
    $sql = "SELECT valor_prod FROM cardapio WHERE id_produto = $id_prod";
    $resultado = pg_query($conexao, $sql);

    if ($resultado) {
        $row = pg_fetch_assoc($resultado);
        $valor_ped = $row['valor_prod'];
    }
}


if (isset($_POST['botao'])) {
    $id_cliente = $_POST['id_cliente'];
    $status = $_POST['status'];
    $id_func = $_POST['id_func'];
    $pag = $_POST['pagamento'];
   

    

    // DEFINE O FUSO HORÁRIO COMO O HORÁRIO DE BRASÍLIA
    date_default_timezone_set('America/Sao_Paulo');
    // CRIA UMA VARIÁVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÁRIO DEFINIDO (BRASÍLIA)
    $dataLocal = date('d/m/Y H:i:s', time());

    // Consulta de inserção
    $sql = "INSERT INTO pedido (data_ped, local_entrega, tipo_pagamento, valor_pedido, id_unico_status, id_func, id_cliente, id_produto)
            VALUES ('$dataLocal', '$local_entrega', '$pag', '$valor_ped', '$status', '$id_func', '$id_cliente', '$id_prod')";

    $resultado = pg_query($conexao, $sql);

    if ($resultado) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar pedido: " . pg_last_error($conexao);
    }
}
?>
