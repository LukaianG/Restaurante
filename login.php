<?php
    include "conecta.php";

    
    if(isset($_POST['entrar'])){
        $login = $_POST['login'];
        $senha = md5($_POST['senha']);
        
        
    $sql = "SELECT * FROM cliente WHERE email_cliente ='$login' AND senha_cliente='$senha'";
        $resultado = pg_query($conexao, $sql);
        

        if( pg_num_rows($resultado)==1){ 
            $registro=pg_fetch_array($resultado);
            
            session_start();

            $_SESSION ['nome'] = $registro['nome_cliente'];
            $_SESSION ['logado'] = true;
            $_SESSION ['ULTIMA_ATIVIDADE'] = time();

            header("location: index.php");
            
          
        } else {
            
                echo "Login ou senha incorretos! ";
            
         }
    }