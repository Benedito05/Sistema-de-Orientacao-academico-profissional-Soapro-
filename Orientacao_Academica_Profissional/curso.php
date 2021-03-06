<?php
session_start();
include_once 'conexao.php';
$connexao = connexao();

 $both = explode('&&', $_POST['id_curso']);

$id_curso = (isset($_POST['id_curso'])) ? $both[0] : (int) $_GET['id_curso'];
$id_instituicao = (isset($_POST['id_curso'])) ? $both[1] : (int) $_GET['id_instituicao'];


$result_cursos = "SELECT * FROM cursos_view WHERE id_curso = '$id_curso' and id_instituicao = '$id_instituicao' LIMIT 1";
$resultado_cursos = mysqli_query($conecta, $result_cursos);



$nome_curso = '';
$nome_fac = '';
$nome_uni = '';
$descricao_curso = '';
$ano_duracao = '';
while ($rows_cursos = mysqli_fetch_array($resultado_cursos)) {
    $nome_curso = $rows_cursos['nome'];
    $nome_fac = $rows_cursos['faculdade'];
    $nome_uni = $rows_cursos['universidade'];
    $descricao_curso = $rows_cursos['descricao'];
    $ano_duracao = $rows_cursos['ano_duracao'];
}
// print_r($result_cursos);
// die();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Curso</title>
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
    <link rel="stylesheet" type="text/css" href="styles/course.css">
    <link rel="stylesheet" type="text/css" href="styles/course_responsive.css">
    <link rel="shortcut icon" href="images/favicon.png">
</head>

<body>

    <div class="super_container">


        <?php include_once './menu.php'; ?>
        <br><br><br><br>

        <div class="course">
            <div class="container">
                <div class="row">

                    <!-- Course -->
                    <div class="col-lg-12">

                        <div class="course_container">
                            <div class="course_title text-center">
                                <?php echo ($nome_curso) ?>
                            </div>
                        </div>
                        <div style="width: 90%;" class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

                            <!-- Course Info Item -->
                            <div style="text-align: center;" class="course_info_item">
                                <div style="text-align: center;" class="course_info_title">Universidade:</div>
                                <div class="course_info_text"><a href="#"><?php echo ($nome_uni) ?></a></div>
                            </div>

                            <!-- Course Info Item -->
                            <div style="text-align: center" class="course_info_item">
                                <div class="course_info_title">Faculdade:</div>
                                <div class="course_info_text"><a href="#"><?php echo ($nome_fac) ?></a></div>
                            </div>

                        </div>

                        <!-- Course Image -->
                        <div class="course_image"><img style="width: 980px" src="images/chapeu.jpg" alt=""></div>

                        <!-- Course Tabs -->
                        <div class="course_tabs_container">
                            <div class="tabs d-flex flex-row align-items-center justify-content-start">
                                <div class="tab active">Descri????o</div>
                                <div class="tab">Ano de Dura????o</div>
                                <div class="tab">Sa??da Profissional</div>

                            </div>
                            <div class="tab_panels">

                                <!-- Description -->
                                <div class="tab_panel active">
                                    <div class="tab_panel_title"><span style="color: #008B8B">  Informa????es Gerais: </span>  </div>
                                    <div class="course_info_text"><a href="#"></a></div>


                                    <div class="tab_panel_content">
                                        <div class="tab_panel_text">
                                        <?= $descricao_curso ?>
                                        </div>

                                    </div>
                                </div>

                                <!-- Curriculum -->
                                <div class="tab_panel tab_panel_2">
                                    <div class="tab_panel_content">
                                        <div class="tab_panel_title"><i style="color: #008B8B"  class="fa fa-clock-o" aria-hidden="true"></i> <span style="color: #008B8B" >Dura????o:</span> <?= $ano_duracao ?> anos</div>
                                        <br>
                                        <div class="tab_panel_content">

                                        </div>



                                    </div>

                                    <!-- Dropdowns -->
                                </div>
                            </div>
                        </div>

                        <!-- Reviews -->
                        <div class="tab_panel tab_panel_3">
                        <div class="tab_panel_title"><i  style="color: #008B8B" class="	fa fa-briefcase" aria-hidden="true"></i> <span style="color: #008B8B">Sa??das Profissionais:</span> </div>
                        <br>
                              <ul style="list-style: circle;font-size: 15px;">

                            <?php

                            $d = $id_curso;
                            $sel = mysqli_query($conecta, "SELECT *FROM saida_profissional as s INNER JOIN curso_superior as c ON s.id_curso = c.id_curso WHERE c.id_curso = '$d'");

                            while ($row = mysqli_fetch_assoc($sel)) {
                           ?>
                           
<li class="tab_panel_title"> <?= $row['nome_saida'] ?>  </li>
                            
                            <?php } ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    
    </div>
    </div>
    </div>


    <footer class="footer">
        <div class="footer_background" style="background-image:url(images/footer_background.png)"></div>
        <div class="container">
            <div class="row footer_row">
                <div class="col">
                    <div class="footer_content">
                        <div class="row">

                            <div class="col-lg-3 footer_col">

                                <!-- Footer About -->
                                <div class="footer_section footer_about">
                                    <div class="footer_logo_container">
                                        <a href="#">
                                            <div class="footer_logo_text">SOA<span>PRO</span></div>
                                        </a>
                                    </div>
                                    <div class="footer_about_text">
                                        <p>O Suporte que voc?? Precisava para a escolha do seu curso.</p>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-3 footer_col">

                                <!-- Footer Contact -->
                                <div class="footer_section footer_contact">
                                    <div class="footer_title">Contacte-nos</div>
                                    <div class="footer_contact_info">
                                        <ul>
                                            <li>Email: info.SOAPRO@gmail.com</li>
                                            <li>Phone: +(244) 933 627 550</li>
                                            <li> <i class="fa fa-map-marker"> Rua Comandante Valodia/ Luanda, Angola</i> </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-3 footer_col">

                                <!-- Footer links -->
                                <div class="footer_section footer_links">
                                    <div class="footer_title">Links Direitos</div>
                                    <div class="footer_links_container">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.html">Sobre</a></li>
                                            <li><a href="contactos.php">Contactar</a></li>
                                            <li><a href="cursos.php">Cursos</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>

            <div class="row copyright_row">
                <div class="col">
                    <div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
                        <div class="cr_text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> Todos Direitos Reservados| Sistema desenvolvido por<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">BDRC</a>

                        </div>
                    </div>
                </div>
            </div>
    </footer>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="js/course.js"></script>





    

</body>

</html>