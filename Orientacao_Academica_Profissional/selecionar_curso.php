<?php include_once("conexao.php");

	$id_faculdade = $_REQUEST['id_faculdade'];
	
	$result_faculdade = "SELECT * FROM curso_superior WHERE faculdade_id=$id_faculdade ORDER BY nome";
     
	$resultado_faculdade = mysqli_query($conn, $result_faculdade);
	
	while ($row_facu = mysqli_fetch_assoc($resultado_faculdade) ) {
		$resultado_faculdade[] = array(
			'id_curso'	=> $row_facu['id_curso'],
			'nome' => utf8_encode($row_facu['nome']),
		);
	}
	
	echo(json_encode($resultado_faculdade));
