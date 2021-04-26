<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$conn = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $conn );

	$Id_Municipio_C = mysql_real_escape_string( $_REQUEST['Id_Municipio_C'] );

	$destrito = array();
mysql_query('SET CHARACTER SET utf8');
	$sqll = "SELECT Id_Distrito, Nome_Destrito
			FROM tbl_distrito
			WHERE Id_Municipio=$Id_Municipio_C
			ORDER BY Nome_Destrito";
	$ress = mysql_query( $sqll );
	while ( $row = mysql_fetch_assoc( $ress ) ) {
		$destrito[] = array(
			'Id_Distrito'	=> $row['Id_Distrito'],
			'Nome_Destrito'	=> $row['Nome_Destrito'],
		);
	}

	echo( json_encode( $destrito ) );