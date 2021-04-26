<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$con = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $con );

	$Id_Pais = mysql_real_escape_string( $_REQUEST['Id_Pais'] );

	$provincia = array();
mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT Id_Provincia, Nome_Provincia
			FROM tbl_provincia
			WHERE Id_Pais=$Id_Pais
			ORDER BY Nome_Provincia";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$provincia[] = array(
			'Id_Provincia'	=> $row['Id_Provincia'],
			'Nome_Provincia'			=> $row['Nome_Provincia'],
		);
	}

	echo( json_encode( $provincia ) );