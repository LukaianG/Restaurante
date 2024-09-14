<?php
    include "conecta.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php
print_r($_POST);

if(isset($_POST['editar'])){
   
    $id = $_POST['editar']; 

    $sql = "SELECT * FROM cardapio WHERE id_produto = '$id'";
    $resultado = pg_query($conexao, $sql);
    $registro = pg_fetch_array($resultado);

    $registro[0];
    
    echo "<form name= 'cadastro' action= 'editar_excluir_cardapio.php' method='post'>";
    echo "<label>
        Nome: <input type='text' name='nome' value='$registro[1]'/>
        </label>

     Status:
    <select name ='status' value='$registro[2]'>
        <option value= '2'>Indisponivel</option>                
        <<option value= '1'>Disponivel</option>
   </select> 

 <label>
     Descricao: <input type='text' name='descricao' value='$registro[3]'/>
 </label>

 <label>
     valor: <input type='number' step='.01' name='valor' value='$registro[4]'/>
 </label>

 <label>
     Quantidade: <input type='number' name='quantidade' value='$registro[5]'/>
 </label>

     Categoria:
    <select name='cat'>";
        
    $sql_cat = "SELECT * FROM categoria ";
    $resultado_cat = pg_query($conexao, $sql_cat);
    $linhas = pg_num_rows($resultado_cat);
    for($i = 0; $i < $linhas; $i++){
        $registro_cat = pg_fetch_array($resultado_cat);
        echo "<option value='$registro_cat[0]'>$registro_cat[1]</option>";

    }
    echo "</select>

    <input type='hidden' name='codigo' value='$registro[0]'>
    <input type='submit' name='botao' value='Cancelar'/>
    <input type='submit' name='botao' value='Cadastrar'/>";

}else if(isset($_POST['excluir'])){
    
    $id = $_POST['excluir'];

    $sql = "DELETE FROM produto WHERE id_produto = '$id'";
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "Registro excluido com sucesso";
    }else{
        echo "Erro ao excluir o registro";
    }
}else{
    $id = $_POST['codigo'];
    $nome = $_POST['nome'];
    $status = $_POST['status'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $quant = $_POST['quantidade'];
    $cat = $_POST['cat'];

    $sql = "UPDATE cardapio
            SET nome_prod = '$nome', status_prod = '$status', desc_prod = '$descricao', valor_prod = '$valor', quant_prod = '$quant', id_cat = '$cat'
            WHERE id_produto = '$id'";
            
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "Produto atualizado com sucesso";
        } else{
        echo "Erro ao atualizar o produto";
        }
}


?>
</body>
</html>