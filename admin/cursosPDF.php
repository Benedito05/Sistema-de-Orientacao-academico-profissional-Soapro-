<?php
session_start();
include './mpdf60/mpdf.php';
require_once('./conexao.php');



$result_curso = "SELECT * from curso_superior";
 $resultado_curso = mysqli_query($conecta, $result_curso);
$me = mysqli_num_rows($resultado_curso);
 while ($row = mysqli_fetch_assoc($resultado_curso)) {
  
    $dados = "
                 ";
        
          $dados .= "<tr class=table table-bordered;>
          <td>  .$row[nome] </td>
          <td> .$row[ano_duracao] </td>
          </tr>;
          ";
}



//  $connexao = connexao();
//  $result_usuario = $connexao->query("SELECT nome FROM curso_superior");
//  while ($row = $result_usuario->fetch()) {
// $dados .='<tr class= "table table-bordered;">
// <td> ' . $row['nome'] . '</td>

// </tr>';
// $dados .="
// ";
//  }

// $result_curso = "SELECT * from curso_superior";
// $resultado_curso = mysqli_query($conecta, $result_curso);
// $me = mysqli_num_rows($resultado_curso);
// while ($row = mysqli_fetch_assoc($resultado_curso)) {
  
//     $dados .= '<tr class= "table table-bordered;">
//                 <td> '. $row[ 'nome'] .' </td>
                
//           </tr>'; 
        
// }






// $result_usuario = "SELECT * from curso_superior";
// $resultado_usuario = mysqli_query($conecta, $result_usuario);
// $me = mysqli_num_rows($resultado_usuario);
// while ($row = mysqli_fetch_assoc($resultado_usuario)) {
  
//     $dados .= '<tr class= "table table-bordered;">
//           <td> ' . $row['nome'] . '</td>
//           <td> ' . $row['descricao'] . '</td>
        
//           </tr>'; 
          
        
// }

$pagina = "<html>
  <link rel='stylesheet' href='./'>
      <link rel='stylesheet' href='dist/css/skins/_all-skins.min.css'>
    
      <link rel='stylesheet' href='bower_components/bootstrap/dist/css/bootstrap.min.css'>
      <link rel='stylesheet' href='dist/css/AdminLTE.min.css'
      <link rel='stylesheet' href='bower_components/font-awesome/css/font-awesome.min.css'>
      <link rel='stylesheet' href='bower_components/Ionicons/css/ionicons.min.css'>
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'>
      <link rel='shortcut icon' href='dist/img/favicon.png'>
      
      </head>

     
                                    

<head>
	<title></title>
  <css='text/css'>
  <style>
*h3{
    text-align: center;
     padding-bottom: -15px:
}


.img-container p{
    text-align: center;
    font-size:20px;
}
* {
  box-sizing: border-box;
}

.img-container {
  float: left;
  width: 38.00%;
  padding: 5px;
}

.clearfix::after {

  clear: both;
  display: table;
}

</head>
<body>
<div style='text-align:center;'>
  <img width='40%' src='dist/img/insignia_destaque.jpg'>
</div>
<p style='text-align:center; margin-top:-3%; text-align:center;'>GOVERNO DE ANGOLA</p>
<p style='text-align:center; margin-top:-3%; text-align:center;'>MINISTÉRIO DAS TELECOMUNICAÇÕES E  TECNOLÓGIAS DA INFORMAÇÃO</p>

<p style='text-align:center; margin-top:-3%; text-align:center;'>SISTEMA DE ORIENTAÇÃO ACADÉMICA PROFISSIONAL</p>
<p style='text-align:center; margin-top:-20%'>SOAPRO</p>
<div class='box-body'>
<br>

  <div class='box-body'>
  
  <h2 style='text-align:center; margin-top:2%'>Relatório de Cursos Superior</h2>
  </div>
 <br>
</div>
		

	<table id='example1' class='table table-bordered'>
    <thead>
        <tr class=''>
           
            <th>Cursos</th>
            <th>Ano de Duração</th>
        </tr>
    </thead>

    <tbody>
   
  
            
           " . $dados . "
        
          
    </tbody>
</table>
        <p style=' text-align: right;'>Total Geral: " . $me . "</p>
</body>
</html>
		";

$arquivo = "Relatório.pdf";
$mpdf = new mPDF("UTF-8", "A4");
$mpdf->WriteHTML($pagina);
ob_clean();
$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário
