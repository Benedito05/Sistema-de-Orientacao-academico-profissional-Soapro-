<?php
session_start();
	include_once 'conexao.php';
	
	$id_curso = $_POST['id_curso'];
        
	$result_cursos = "SELECT * FROM curso_superior WHERE nome LIKE %$id_curso% ";
	$resultado_cursos = mysqli_query($conecta, $result_cursos);
	
	while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
		echo "Nome do curso: ".$rows_cursos['nome']."<br>";
	}
?>