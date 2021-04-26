<head>
    <title>Institutos Privados</title>
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
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;

$sql = "SELECT * FROM instituicao_sup   ORDER BY id_instituicao ASC LIMIT $start_from, $limit";
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



    <div class="col-lg-6 course_col">
        <div class="course">
            <a style="color: #000" href="ver_curso_faculdade.php?id_instituicao=<?php echo ($rs->id_instituicao); ?>" <p>
                <div class="course_image "><img src="../admin/dist/img/uni_foto/<?php echo ($rs->foto); ?>"></div>
                </p>
            </a>
            <div class="course_body">
                <a style="color: #000" href="ver_curso_faculdade.php?id_instituicao= <?php echo ($rs->id_instituicao); ?>" <p>
                    <h3 class="course_title"> <?php echo  ($rs->nome); ?></h3>
                    </p>
                </a>

                <div class="course_text">

                    <a style="color: #000" href="ver_curso_faculdade.php?id_instituicao=<?php echo ($rs->id_instituicao); ?>" <p><?php echo (' Sector : ' . $rs->sector); ?></p></a>
                </div>
            </div>
            <div class="course_footer">
                <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                </div>
            </div>
        </div>
    </div>


<?php } ?>