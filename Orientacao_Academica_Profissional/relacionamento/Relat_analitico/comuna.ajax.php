<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$con = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $con );

	$Id_Distrito = mysql_real_escape_string( $_REQUEST['Id_Distrito'] );

	$comuna = array();
mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT Id_Comuna, Nome_Comuna
			FROM tbl_comuna
			WHERE Id_Distrito=$Id_Distrito
			ORDER BY Nome_Comuna";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$comuna[] = array(
			'Id_Comuna'	=> $row['Id_Comuna'],
			'Nome_Comuna'	=> $row['Nome_Comuna'],
		);
	}

	echo( json_encode( $comuna ) );