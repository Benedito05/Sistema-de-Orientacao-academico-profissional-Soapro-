<?php
$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "sig_oap";
	
	//Criar a conexao
	$conecta = mysqli_connect($servidor, $usuario, $senha, $dbname);
        
        
        
	function connexao(){
		try {
			$connexao =  new PDO('mysql:host=localhost; dbname=sig_oap','root','');
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		return $connexao;
	}

?>