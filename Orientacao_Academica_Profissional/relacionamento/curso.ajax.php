<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$conecta = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sig_oap', $conecta );

	$Id_Distrito = mysql_real_escape_string( $_REQUEST['id_faculdade'] );

	$comuna = array();
mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT id_curso, nome
			FROM curso_superior
			WHERE id_faculdade=$Id_Distrito
			ORDER BY nome";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$comuna[] = array(
			'id_curso'	=> $row['id_curso'],
			'nome'	=> $row['nome'],
		);
	}

	echo( json_encode( $comuna ) );