<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$con = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $con );

	$Id_Comuna = mysql_real_escape_string( $_REQUEST['Id_Comuna'] );

	$c_moradores = array();
mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT Id_C_Moradores, Nome_Comisao
			FROM tbl_comissao_moradores
			WHERE Id_Comuna=$Id_Comuna
			ORDER BY Nome_Comisao";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$c_moradores[] = array(
			'Id_C_Moradores'	=> $row['Id_C_Moradores'],
			'Nome_Comisao'	=> $row['Nome_Comisao'],
		);
	}

	echo( json_encode( $c_moradores ) );