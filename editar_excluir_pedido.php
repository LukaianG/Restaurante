<?php
    include "conecta.php";
?>


<?php


if(isset($_POST['editar'])){
   
    $id = $_POST['editar']; 

    $sql = "SELECT * FROM pedido WHERE id_pedido = '$id'";
    $resultado = pg_query($conexao, $sql);
    $registro = pg_fetch_array($resultado);

    $registro[0];
    
    echo" <form name='cadastro_pedido.php' action='editar_excluir_pedido.php' method='post'>";
    echo" <label>
            ID do cliente: <input type='number' name='id_cliente' value='$registro[6]'>  
        </label><br>

        Status do pedido:
        <select name='status'>";

            $sql_status = "SELECT * FROM status_ped ";
            $resultado_status = pg_query($conexao, $sql_status);
            $linhas = pg_num_rows($resultado_status);
            for($i = 0; $i < $linhas; $i++){
                $registro_status = pg_fetch_array($resultado_status);
                echo "<option value='$registro_status[1]'>$registro_status[0]</option>";
            }

        echo"</select><br>

        <label>
            ID do funcionário: <input type='number' name='id_func' value='$registro[5]'>
        </label><br>

        <label>
            ID do produto: <input type='number' name='id_prod' value='$registro[7]'>
        </label><br>


        Forma de pagamento:
        <select name='pagamento'>";

        
        $sql_pag = "SELECT * FROM pagamento";
        $resultado_pag = pg_query($conexao, $sql_pag);
        $linhas = pg_num_rows($resultado_pag);
        for($i = 0; $i < $linhas; $i++){
    $registro_pag = pg_fetch_array($resultado_pag);
    echo "<option value='$registro_pag[0]'>$registro_pag[1]</option>";

}
            
        echo"</select><br>

        <label>
            Local de entrega: <input type='text' name='entrega' value='$registro[1]'>
        </label><br>

       
   
    
    <input type='hidden' name='codigo' value='$registro[8]'>
    <input type='hidden' name='data' value='$registro[0]'>
    <input type='submit' name='botao' value='Cancelar'/>
    <input type='submit' name='botao' value='Cadastrar'/>
    
    </form>";

}else if(isset($_POST['excluir'])){
    
    $id = $_POST['excluir'];

    $sql = "DELETE FROM pedido WHERE id_pedido = '$id'";
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "Registro excluido com sucesso";
    }else{
        echo "Erro ao excluir o registro";
    }
}else{
      
    $id_prod = isset($_POST['id_prod']) ? $_POST['id_prod'] : 0;
    $valor_ped = '';

    if ($id_prod) {
        $sql = "SELECT valor_prod FROM cardapio WHERE id_produto = $id_prod";
        $resultado = pg_query($conexao, $sql);

        if ($resultado) {
            $row = pg_fetch_assoc($resultado);
            $valor_ped = $row['valor_prod'];
        }
    }


    $id = $_POST['codigo'];
    $dataLocal = $_POST['data'];
    $local_entrega  = $_POST['entrega'];
    $pag = $_POST['pagamento'];
    $status = $_POST['status'];
    $id_func = $_POST['id_func'];
    $id_cliente = $_POST['id_cliente'];
    $id_prod = $_POST['id_prod'];

    $sql = "UPDATE pedido
            SET data_ped = '$dataLocal', local_entrega = '$local_entrega', tipo_pagamento = '$pag',
             valor_pedido = '$valor_ped', id_unico_status = '$status', id_func = '$id_func', id_cliente = '$id_cliente', id_produto = '$id_prod'
            WHERE id_pedido = '$id'";
            
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "pedido atualizado com sucesso";
        } else{
        echo "Erro ao atualizar o pedido";
        }
}


?>
