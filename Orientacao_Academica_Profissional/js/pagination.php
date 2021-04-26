<?php
session_start();
include_once("conexao.php");
$connexao = connexao();

$limit = 2;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM curso_superior ORDER BY nome ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conecta, $sql);  
?>
<table class="table table-bordered table-striped">  
<thead>  
<tr>  
<th>title</th>  
<th>body</th>  
</tr>  
</thead>  
<tbody>  
<?php  
while ($row = mysqli_fetch_assoc($rs_result)) {  
?>  
            <tr>  
            <td><? echo $row["nome"]; ?></td>  
            <td><? echo $row["ano_duracao"]; ?></td>  
            </tr>  
<?php  
};  
?>  
</tbody>  
</table>    