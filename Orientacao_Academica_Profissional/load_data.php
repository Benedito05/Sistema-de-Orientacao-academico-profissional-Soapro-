<?php
session_start();
include_once("conexao.php");
$connexao = connexao();
$perPage = 5;
if (isset($_GET["page"])) { 
	$page  = $_GET["page"]; 
} else { 
	$page=1; 
};  
$startFrom = ($page-1) * $perPage;  
$sqlQuery = "SELECT id_curso, nome, ano_duracao, saida_profissional,
	FROM curso_superior ORDER BY id_curso ASC LIMIT $startFrom, $perPage";  
$result = mysqli_query($conn, $sqlQuery); 
$paginationHtml = '';
while ($row = mysqli_fetch_assoc($result)) {  
	$paginationHtml.='<tr>';  
	$paginationHtml.='<td>'.$row["id_curso"].'</td>';
	$paginationHtml.='<td>'.$row["nome"].'</td>';
	$paginationHtml.='<td>'.$row["ano_duracao"].'</td>'; 
	$paginationHtml.='<td>'.$row["saida_profissional"].'</td>';
	// $paginationHtml.='<td>'.$row["skills"].'</td>';
	// $paginationHtml.='<td>'.$row["designation"].'</td>'; 
	$paginationHtml.='</tr>';  
} 
$jsonData = array(
	"html"	=> $paginationHtml,	
);
echo json_encode($jsonData); 
?>