<?php
    include "conecta.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos clientes</title>
</head>
<body>
    

<?php

$sql = "SELECT * FROM cliente"; 
$resultado = pg_query($conexao, $sql);
$linhas = pg_num_rows($resultado);

echo "<form action='editar_excluir_cliente.php' method='post'>";
echo "<table border='2'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>CEP</th>";
echo "<th>telefone</th>";
echo "<th>logradouro</th>";
echo "<th>complemento</th>";
echo "<th>Email</th>";
echo "<th>Nome</th>";
echo "<th>senha</th>";
echo "<th>numero da rua</th>";
echo "<th>bairro</th>";
echo "<th>cidade</th>";
echo "<th>Estado</th>";
echo "<th>Editar</th>";
echo "<th>Excluir</th>";
echo "</tr>";

for($i = 0; $i < $linhas; $i++){
    $registro = pg_fetch_array($resultado);
    echo "<tr>";
    echo "<td>" . $registro['id_cliente']. "</td>\n";
    echo "<td>" . $registro['cep']. "</td>\n";
    echo "<td>" . $registro['telefone']. "</td>\n";
    echo "<td>" . $registro['logradouro']. "</td>\n";
    echo "<td>" . $registro['complemento']. "</td>\n";
    echo "<td>" . $registro['email_cliente']. "</td>\n";
    echo "<td>" . $registro['nome_cliente']. "</td>\n";
    echo "<td>" . $registro['senha_cliente']. "</td>\n";
    echo "<td>" . $registro['num_rua']. "</td>\n";
    echo "<td>" . $registro['bairro']. "</td>\n";
    echo "<td>" . $registro['cidade']. "</td>\n";
    echo "<td>" . $registro['estado_cliente']. "</td>\n";
    echo "<td><button name='editar'value='$registro[0]'>Editar</button></td>";
    echo "<td><button name='excluir'value='$registro[0]'>Excluir</button></td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>