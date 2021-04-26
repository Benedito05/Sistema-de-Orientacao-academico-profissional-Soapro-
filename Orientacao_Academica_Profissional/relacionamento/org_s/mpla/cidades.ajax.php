<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$conn = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $conn );

	$Id_Pais_COM = mysql_real_escape_string( $_REQUEST['Id_Pais_COM'] );

	$provincias = array();
mysql_query('SET CHARACTER SET utf8');
	$sqll = "SELECT Id_Provincia, Nome_Provincia
			FROM tbl_provincia
			WHERE Id_Pais=$Id_Pais_COM
			ORDER BY Nome_Provincia";
	$ress = mysql_query( $sqll );
	while ( $row = mysql_fetch_assoc( $ress ) ) {
		$provincias[] = array(
			'Id_Provincia'	=> $row['Id_Provincia'],
			'Nome_Provincia'			=> $row['Nome_Provincia'],
		);
	}

	echo( json_encode( $provincias ) );