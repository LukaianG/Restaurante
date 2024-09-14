<?php
	session_start();

	if(!isset($_SESSION['logado'])){
		header("location: login.php");
	}

    echo "Bem vindo(a) ". $_SESSION['nome']."!"." | <a href='logout.php'> Sair</a>";

    $timeout = $_SERVER['REQUEST_TIME'];
	$duracao = 3;
    if(isset($_SESSION['ULTIMA_ATIVIDADE']) && ($timeout - $_SESSION['ULTIMA_ATIVIDADE']) > $duracao) {
        $_SESSION = array();
        session_destroy();
        header("location: login.html");
    }

    $_SESSION['ULTIMA_ATIVIDADE'] = $timeout;