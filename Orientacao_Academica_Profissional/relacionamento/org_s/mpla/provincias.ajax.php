<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$conn = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $conn );

	$Id_Provincia_COM = mysql_real_escape_string( $_REQUEST['Id_Provincia_COM'] );

	$municipio = array();
mysql_query('SET CHARACTER SET utf8');
	$sqll = "SELECT Id_Municipio, Nome_Municipio
			FROM tbl_municipio
			WHERE Id_Provincia=$Id_Provincia_COM
			ORDER BY Nome_Municipio";
	$ress = mysql_query( $sqll );
	while ( $row = mysql_fetch_assoc( $ress ) ) {
		$municipio[] = array(
			'Id_Municipio'	=> $row['Id_Municipio'],
			'Nome_Municipio'	=> $row['Nome_Municipio'],
		);
	}

	echo( json_encode( $municipio ) );