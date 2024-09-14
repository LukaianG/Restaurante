<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $servidor = "localhost";
    $porta = 5432;
    $bd = "restaurante";  
    $usuario = "postgres";
    $senha = "12345";

    $conexao = pg_connect(  "host=$servidor
                            port=$porta 
                            dbname=$bd 
                            user=$usuario 
                            password=$senha");
    
    if(!$conexao){
        die("não foi  possivel se conectar ao banco de dados.");
    }
    ?>
</body>
</html>