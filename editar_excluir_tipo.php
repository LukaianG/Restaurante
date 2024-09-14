<?php
    include "conecta.php";
?>


<?php


if(isset($_POST['editar'])){
   
    $id = $_POST['editar']; 

    $sql = "SELECT * FROM tipo WHERE id_tipo = '$id'";
    $resultado = pg_query($conexao, $sql);
    $registro = pg_fetch_array($resultado);

    $registro[0];
    
    echo" <form name='cadastro_tipo.php' action='editar_excluir_tipo.php' method='post'>";
    echo" <label>Nome: <input type='text' name='nome' value='$registro[1]'/><label>
        <br>
    
    <input type='hidden' name='codigo' value='$registro[0]'>
    <input type='submit' name='botao' value='Cancelar'/>
    <input type='submit' name='botao' value='Cadastrar'/>
    
    </form>";

}else if(isset($_POST['excluir'])){
    
    $id = $_POST['excluir'];

    $sql = "DELETE FROM tipo WHERE id_tipo = '$id'";
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "Registro excluido com sucesso";
    }else{
        echo "Erro ao excluir o registro";
    }
}else{
    $id = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "UPDATE tipo
            SET nome_tipo = '$nome'
            WHERE id_tipo = '$id'";
            
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "tipo atualizado com sucesso";
        } else{
        echo "Erro ao atualizar o tipo";
        }
}


?>
