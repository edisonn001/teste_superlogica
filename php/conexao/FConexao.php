<?php	
	$servidor = "127.0.0.1";
	$usuario  = "root";
	$senha 	  = "root";	
	$banco 	  = "teste_superlogica";
 
	$conexao = mysqli_connect($servidor, $usuario, $senha , $banco);
	if (!$conexao) {
		echo "Erro ao conectar ao Banco de Dados, erro: " . mysqli_connect_error();
    exit;
	}
?> 