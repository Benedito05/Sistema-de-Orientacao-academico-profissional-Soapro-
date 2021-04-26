<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$con = mysql_connect( 'localhost', 'root', '' ) ;
	mysql_select_db( 'sgq_mpla', $con );

	$Id_Provincia_IP = mysql_real_escape_string( $_REQUEST['Id_Provincia_IP'] );

	$c_comite = array();
mysql_query('SET CHARACTER SET utf8');
	$sql = "SELECT Id_C_Especialidade, Nome_C_Especialidade
			FROM tbl_comite_especialidade
			WHERE Id_Provincia=$Id_Provincia_IP
			ORDER BY Nome_C_Especialidade";
	$res = mysql_query( $sql );
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$c_comite[] = array(
			'Id_C_Especialidade'	=> $row['Id_C_Especialidade'],
			'Nome_C_Especialidade'	=> $row['Nome_C_Especialidade'],
		);
	}

	echo( json_encode( $c_comite ) );