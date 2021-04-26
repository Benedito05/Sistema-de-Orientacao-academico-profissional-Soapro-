
<head>
    <title>Cursos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/courses.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
</head>
<?php
session_start();
include_once("conexao.php");
$connexao = connexao(); 

$limit = 4;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM curso_superior ORDER BY nome ASC LIMIT $start_from, $limit";  
try {
    $read = $connexao->prepare($sql);
    $read->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>


 
<?php  
while ($rs = $read->fetch(PDO::FETCH_OBJ)) {  
?>
<div class="col-lg-3 feature_col">



<div style="margin: 0 auto; text-align: center">
<a href="curso_detalhes.php?id_curso=<?php echo ($rs->id_curso); ?>">
    <div class="feature text-center trans_400">
        <br> <br>
        <div class="feature_icon"><i style="color: #007bff" class="fa fa-graduation-cap fa-4x"></i> </div>
        <br>
        <h3 class="feature_title"><?php echo ($rs->nome); ?></h3>
        <div class="">
            <p style="font-size: 100%;color: #0092ef;">Saber Mais..</p>
        </div>

    </div>
</a>
</div>
</div>



<?php } ?>

 
