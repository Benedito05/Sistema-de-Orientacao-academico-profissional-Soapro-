<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$conn = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $conn );

	$Id_Comuna_IP = mysql_real_escape_string( $_REQUEST['Id_Comuna_IP'] );

	$ncap = array();
mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT Id_Cap, Numero_Cap
			FROM tbl_numero_cap
			WHERE Id_Comuna=$Id_Comuna_IP
			ORDER BY Numero_Cap";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$ncap[] = array(
			'Id_Cap'	=> $row['Id_Cap'],
			'Numero_Cap'	=> $row['Numero_Cap'],
		);
	}

	echo( json_encode( $ncap ) );