<?php
    include "conecta.php";
?>


<?php


if(isset($_POST['editar'])){
   
    $id = $_POST['editar']; 

    $sql = "SELECT * FROM categoria WHERE id_cat = '$id'";
    $resultado = pg_query($conexao, $sql);
    $registro = pg_fetch_array($resultado);

    $registro[0];
    
    echo" <form name='cadastro_categoria.php' action='editar_excluir_categoria.php' method='post'>";
    echo" <label>Nome da categoria: <input type='text' name='nome' value='$registro[1]'/><label>
        <br>
        <label>
            Descrição: <input type='text' name='descricao' value='$registro[2]'/></label>
            <br>
    
    </form>


    <input type='hidden' name='codigo' value='$registro[0]'>
    <input type='submit' name='botao' value='Cancelar'/>
    <input type='submit' name='botao' value='Cadastrar'/>";

}else if(isset($_POST['excluir'])){
    
    $id = $_POST['excluir'];

    $sql = "DELETE FROM categoria WHERE id_cat = '$id'";
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "Registro excluido com sucesso";
    }else{
        echo "Erro ao excluir o registro";
    }
}else{
    $id = $_POST['codigo'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];


    $sql = "UPDATE categoria
            SET nome_cat = '$nome', desc_cat = '$descricao'
            WHERE id_cat = '$id'";
            
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "categoria atualizado com sucesso";
        } else{
        echo "Erro ao atualizar o categoria";
        }
}


?>
