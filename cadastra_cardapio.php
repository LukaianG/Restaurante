<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardapio</title>
</head>
<body>
    <form name="cadastra_cardapio" action="cadastra_cardapio.php" method="post">

    <h3>Cadastro produto </h3>

    <label>
       Nome: <input type="text" name="nome"/><br>
    </label>
        Status:
    <select name ="status">
      <option value= "1">Disponivel</option>
      <option value= "2">Indisponivel</option>                
</select> <br>
    <label>
        Descricao: <input type="text" name="descricao"/><br>
    </label>
    <label>
        valor: <input type="number" step=".01" name="valor"/><br>
    </label>
    <label>
        Quantidade: <input type="number" name="quantidade"/><br>
    </label>
      

    
    
   
<?php
    include "conecta.php";

    echo"Categoria:";
    echo"<select name='cat'>";
        
    $sql_cat = "SELECT * FROM categoria" ;
    $resultado_cat = pg_query($conexao, $sql_cat);
    $linhas = pg_num_rows($resultado_cat);
    for($i = 0; $i < $linhas; $i++){
        $registro_cat = pg_fetch_array($resultado_cat);
        echo "<option value='$registro_cat[0]'>$registro_cat[1]</option>";

    }
    echo "</select>";
    

    echo "<input type='submit' name='botao' value='Enviar'/>";

    if(isset($_POST['botao'])){
        $nome = $_POST['nome'];
        $status = $_POST['status'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $quantidade = $_POST['quantidade'];
        $cat = $_POST['cat'];

        $sql = "INSERT INTO cardapio (nome_prod,status_prod, desc_prod, valor_prod, quant_prod, id_cat) 
                VALUES ('$nome','$status', '$descricao', '$valor', '$quantidade', '$cat')";


        $resultado = pg_query($conexao, $sql);
        
    if($resultado){
        echo "cadastrado com sucesso!";
        } else{
        echo "Erro no cadastro das informações";
        }
    }
?>
 </form>
</body>
</html>