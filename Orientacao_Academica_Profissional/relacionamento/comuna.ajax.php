<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$conecta = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sig_oap', $conecta );

	$Id_Distrito = mysql_real_escape_string( $_REQUEST['id_universidade'] );

	$comuna = array();
mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT a.id_instituicao, a.id_faculdade, b.nome AS cv, b.id_faculdade, c.nome, c.id_instituicao  FROM instituto_faculdade AS a INNER JOIN faculdade as b ON a.id_faculdade=b.id_faculdade INNER JOIN instituicao_sup as c ON a.id_instituicao = c.id_instituicao Where c.id_instituicao=$Id_Distrito
			ORDER BY nome";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$comuna[] = array(
			'id_faculdade'	=> $row['id_faculdade'],
			'nome'	=> $row['cv'],
		);
	}

	echo( json_encode( $comuna ) );