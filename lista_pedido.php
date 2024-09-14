<?php
    include "conecta.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos pedidos</title>
</head>
<body>
    

<?php

//duas formas de buscar mais informações pelo  WHERE

//utilizando o método JOIN

/*$sql = "SELECT * FROM pedido 
JOIN pagamento ON pedido.tipo_pagamento = pagamento.id_tipo_pag 
JOIN status_ped ON pedido.id_unico_status = status_ped.id_unico_status 
JOIN funcionario ON pedido.id_func = funcionario.id_func 
JOIN cliente ON pedido.id_cliente = cliente.id_cliente 
JOIN cardapio ON pedido.id_produto = cardapio.id_produto"; 
*/
//Trocando as virgulas por AND 

$sql = "SELECT * FROM pedido, pagamento, status_ped, funcionario, cliente, cardapio
 WHERE pedido.tipo_pagamento = pagamento.id_tipo_pag and pedido.id_unico_status = status_ped.id_unico_status and pedido.id_func = funcionario.id_func and
 pedido.id_cliente = cliente.id_cliente and pedido.id_produto = cardapio.id_produto"; 


$resultado = pg_query($conexao, $sql);
$linhas = pg_num_rows($resultado);

echo "<form action='editar_excluir_pedido.php' method='post'>";
echo "<table border='2'>";
echo "<tr>";
echo "<th>Data</th>";
echo "<th>Local de entrega</th>";
echo "<th>Tipo de pagamento</th>";
echo "<th>Valor do pedido</th>";
echo "<th>Status do pedido</th>";
echo "<th>Funcionario</th>";
echo "<th>Cliente</th>";
echo "<th>Produto</th>";
echo "<th>ID do pedido</th>";
echo "<th>Editar</th>";
echo "<th>Excluir</th>";
echo "</tr>";

for($i = 0; $i < $linhas; $i++){
    $registro = pg_fetch_array($resultado);
    echo "<tr>";
    echo "<td>" . $registro['data_ped']. "</td>\n";
    echo "<td>" . $registro['local_entrega']. "</td>\n";
    echo "<td>" . $registro['tipo_pagamento']. "</td>\n";
    echo "<td>" . $registro['valor_pedido']. "</td>\n";
    echo "<td>" . $registro['id_unico_status']. "</td>\n";
    echo "<td>" . $registro['id_func']. "</td>\n";
    echo "<td>" . $registro['id_cliente']. "</td>\n";
    echo "<td>" . $registro['id_produto']. "</td>\n";
    echo "<td>" . $registro['id_pedido']. "</td>\n";
    echo "<td><button name='editar'value='$registro[8]'>Editar</button></td>";
    echo "<td><button name='excluir'value='$registro[8]'>Excluir</button></td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>