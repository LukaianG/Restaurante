<?php
    include "conecta.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista do pagamento</title>
</head>
<body>
    

<?php

$sql = "SELECT * FROM pagamento"; 
$resultado = pg_query($conexao, $sql);
$linhas = pg_num_rows($resultado);

echo "<form action='editar_excluir_pagamento.php' method='post'>";
echo "<table border='2'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nome</th>";
echo "<th>Editar</th>";
echo "<th>Excluir</th>";
echo "</tr>";

for($i = 0; $i < $linhas; $i++){
    $registro = pg_fetch_array($resultado);
    echo "<tr>";
    echo "<td>" . $registro['id_tipo_pag']. "</td>\n";
    echo "<td>" . $registro['nome_pag']. "</td>\n";
    echo "<td><button name='editar'value='$registro[0]'>Editar</button></td>";
    echo "<td><button name='excluir'value='$registro[0]'>Excluir</button></td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>