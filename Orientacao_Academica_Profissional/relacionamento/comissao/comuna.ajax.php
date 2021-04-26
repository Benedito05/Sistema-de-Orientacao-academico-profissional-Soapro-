<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$conn = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $conn );

	$Id_Distrito_LN = mysql_real_escape_string( $_REQUEST['Id_Distrito_LN'] );

	$comuna = array();
mysql_query('SET CHARACTER SET utf8');
	$sqll = "SELECT Id_Comuna, Nome_Comuna
			FROM tbl_comuna
			WHERE Id_Distrito=$Id_Distrito_LN
			ORDER BY Nome_Comuna";
	$ress = mysql_query( $sqll );
	while ( $row = mysql_fetch_assoc( $ress ) ) {
		$comuna[] = array(
			'Id_Comuna'	=> $row['Id_Comuna'],
			'Nome_Comuna'	=> $row['Nome_Comuna'],
		);
	}

	echo( json_encode( $comuna ) );