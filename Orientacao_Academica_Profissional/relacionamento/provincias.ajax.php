<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$con = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $con );

	$Id_Provincia = mysql_real_escape_string( $_REQUEST['Id_Provincia'] );

	$municipio = array();
mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT Id_Municipio, Nome_Municipio
			FROM tbl_municipio
			WHERE Id_Provincia=$Id_Provincia
			ORDER BY Nome_Municipio";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$municipio[] = array(
			'Id_Municipio'	=> $row['Id_Municipio'],
			'Nome_Municipio'	=> $row['Nome_Municipio'],
		);
	}

	echo( json_encode( $municipio ) );