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

$id = $_GET['id_instituicao'];

$sqlread = "SELECT * from instituicao_view where id_instituicao = '" . $id . "' ";
try {
    $read = $connexao->prepare($sqlread);
    $read->execute();
} catch (PDOException $e) {
    echo $e->getMessage();



}

$faculdade_univerdade = '';
$show_cursos = '';




while ($rs = $read->fetch(PDO::FETCH_OBJ)) {


    $faculdade_univerdade = $rs->universidade;

    $show_cursos .= '<div class="col-lg-6 course_col">
        <div class="course">
            <div class="course_image " ></div>
            <div class="course_body">
                <h3 class="course_title"><a href="curso.php?id_curso=' . $rs->id_curso . '&id_instituicao=' . $id . ' "> <div  class="feature_icon"><i style="color: #007bff" class="fa fa-graduation-cap fa-4x"></i> </div>' . 'FACULDADE :.' . $rs->faculdade . '</a></h3>
                <div class="course_text">
                    <div  class=""><i style="color: #007bff" class="text-center"></i> </div>  <p>CURSO :  ' . $rs->curso . ' </p>
                    <div  class=""><i style="color: #007bff" class="text-center"></i> </div>  <p>Universidade ou Instituto :  ' . $rs->universidade . '</p>
                </div>

            </div>
            <div class="course_footer">
                <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                </div>
            </div>
        </div>
    </div>
';
}
?>




<?php
while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
?>

  <!-- Courses Main Content -->
  <div class="col-lg-12">

<div class="courses_container">
    <div class="text-center" style="color: #007bff"><i class=""></i>
        <h2><?= $faculdade_univerdade ?></h2>
    </div>






        <!-- Course -->
        <!-- <?= $show_cursos ?> -->
        <!-- single-agent -->


</div>
<?php } ?>