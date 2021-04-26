<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$con = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $con );

	$Id_Municipio = mysql_real_escape_string( $_REQUEST['Id_Municipio'] );

	$destrito = array();
mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT Id_Distrito, Nome_Destrito
			FROM tbl_distrito
			WHERE Id_Municipio=$Id_Municipio
			ORDER BY Nome_Destrito";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$destrito[] = array(
			'Id_Distrito'	=> $row['Id_Distrito'],
			'Nome_Destrito'	=> $row['Nome_Destrito'],
		);
	}

	echo( json_encode( $destrito ) );