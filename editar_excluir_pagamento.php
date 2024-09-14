<?php
    include "conecta.php";
?>


<?php


if(isset($_POST['editar'])){
   
    $id = $_POST['editar']; 

    $sql = "SELECT * FROM pagamento WHERE id_tipo_pag = '$id'";
    $resultado = pg_query($conexao, $sql);
    $registro = pg_fetch_array($resultado);

    $registro[0];
    
    echo" <form name='cadastro_pagamento.php' action='editar_excluir_pagamento.php' method='post'>";
    echo" <label>Nome: <input type='text' name='nome' value='$registro[1]'/><label>
        <br>
    
    <input type='hidden' name='codigo' value='$registro[0]'>
    <input type='submit' name='botao' value='Cancelar'/>
    <input type='submit' name='botao' value='Cadastrar'/>
    
    </form>";

}else if(isset($_POST['excluir'])){
    
    $id = $_POST['excluir'];

    $sql = "DELETE FROM pagamento WHERE id_tipo_pag = '$id'";
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "Registro excluido com sucesso";
    }else{
        echo "Erro ao excluir o registro";
    }
}else{
    $id = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "UPDATE pagamento
            SET nome_pag = '$nome'
            WHERE id_tipo_pag = '$id'";
            
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "pagamento atualizado com sucesso";
        } else{
        echo "Erro ao atualizar o pagamento";
        }
}


?>
