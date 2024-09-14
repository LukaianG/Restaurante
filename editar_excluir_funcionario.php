<?php
    include "conecta.php";
?>


<?php

if(isset($_POST['editar'])){
   
    $id = $_POST['editar']; 

    $sql = "SELECT * FROM funcionario WHERE id_func = '$id'";
    $resultado = pg_query($conexao, $sql);
    $registro = pg_fetch_array($resultado);

    $registro[0];
    
    echo" <form name='cadastro_funcionario.php' action='editar_excluir_funcionario.php' method='post'>";
    echo"<label>
    Nome: <input type='text' name='nome' value='$registro[1]'/><br>
 </label>
 <label>
    cpf: <input type='text' name='cpf' value='$registro[2]'/><br>
 </label> 
 <label>
   telefone: <input type='number' name='telefone' value='$registro[3]'/><br>
 </label> 

 <select name='tipo'>";
        
    $sql_tipo = "SELECT * FROM tipo ";
    $resultado_tipo = pg_query($conexao, $sql_tipo);
    $linhas = pg_num_rows($resultado_tipo);
    for($i = 0; $i < $linhas; $i++){
        $registro_tipo = pg_fetch_array($resultado_tipo);
        echo "<option value='$registro_tipo[0]'>$registro_tipo[1]</option>";

    }
    echo "</select>

    <input type='hidden' name='codigo' value='$registro[0]'>
    <input type='submit' name='botao' value='Cancelar'/>
    <input type='submit' name='botao' value='Cadastrar'/>";

}else if(isset($_POST['excluir'])){
    
    $id = $_POST['excluir'];

    $sql = "DELETE FROM funcionario WHERE id_func = '$id'";
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "Registro excluido com sucesso";
    }else{
        echo "Erro ao excluir o registro";
    }
}else{
    $id = $_POST['codigo'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $tipo = $_POST['tipo'];


    $sql = "UPDATE funcionario
            SET nome_func = '$nome', cpf_func = '$cpf', celular_func = '$telefone', id_tipo = '$tipo'
            WHERE id_func = '$id'";
            
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "funcionario atualizado com sucesso";
        } else{
        echo "funcionario ao atualizar o produto";
        }
}


?>