<?php
    include "conecta.php";
?>


<?php


if(isset($_POST['editar'])){
   
    $id = $_POST['editar']; 

    $sql = "SELECT * FROM cliente WHERE id_cliente = '$id'";
    $resultado = pg_query($conexao, $sql);
    $registro = pg_fetch_array($resultado);

    $registro[0];
    
    echo"<form name='cadastro_cliente' action='editar_excluir_cliente.php' method='post'>";
    echo"<label>
    Nome: <input type='text' name='nome' value='$registro[6]'/><br>
 </label>
 <label>
    Email: <input type='text' name='email' value='$registro[5]'/><br>
 </label>
 <label>
    senha: <input type='password' name='senha' value='$registro[7]'/><br>
 </label> 
 <label>
   telefone: <input type='number' name='telefone' value='$registro[2]'/><br>
 </label> 
   
 <label>
   CEP: <input id='cep' type='number' name='cep' value='$registro[1]'><br>
</label>  
<label>
    logradouro: <input id='logradouro' type='text' name='rua' value='$registro[3]'/><br>
 </label>
 <label>
   numero: <input type='number' name='numero' value='$registro[8]'><br>
</label>
<label>
   complemento: <input type='text' name='complemento' value='$registro[4]'><br>
</label>
 <label>
    bairro: <input id='bairro' type='text' name='bairro'  value='$registro[9]'/><br>
 </label>
 <label>
    cidade: <input id='cidade' type='text' name='cidade'  value='$registro[10]'/><br>
 </label>
 <label>
    estado: <input id='estado' type='text' name='estado'  value='$registro[11]'/><br>
 </label>


    

    <input type='hidden' name='codigo' value='$registro[0]'>
    <input type='submit' name='botao' value='Cancelar'/>
    <input type='submit' name='botao' value='Cadastrar'/>
    
    </form>";


    
}else if(isset($_POST['excluir'])){
    
    $id = $_POST['excluir'];

    $sql = "DELETE FROM cliente WHERE id_cliente = '$id'";
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "Registro excluido com sucesso";
    }else{
        echo "Erro ao excluir o registro";
    }
}else{
    $id = $_POST['codigo'];
    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $telefone = $_POST['telefone'];
    $logradouro = $_POST['rua'];
    $complemento = $_POST['complemento'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $num = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $sql = "UPDATE cliente
            SET cep = '$cep', telefone = '$telefone', logradouro = '$logradouro', complemento = '$complemento', email_cliente = '$email', 
            nome_cliente = '$nome', senha_cliente = '$senha', num_rua = '$num', bairro = '$bairro', cidade = '$cidade', estado_cliente = '$estado'
            WHERE id_cliente = '$id'";
            
    $resultado = pg_query($conexao, $sql);

    if($resultado){
        echo "cliente atualizado com sucesso";
        } else{
        echo "Erro ao atualizar o cliente";
        }
}


?>
