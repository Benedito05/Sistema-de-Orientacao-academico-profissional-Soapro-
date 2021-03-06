<?php
include_once 'conexao.php';
session_start();
$connexao = connexao();


$id_c = $_GET['id_curso'];
$id_i = $_GET['id_instituicao'];


$result_cursos = "SELECT * FROM cursos_view WHERE id_curso = '$id_c' and id_instituicao = '$id_i' LIMIT 1";
$resultado_cursos = mysqli_query($conecta, $result_cursos);

$nome_curso = '';
$nome_fac = '';
$nome_uni = '';
$ano_duracao = '';
$descricao_curso='';
while ($rows_cursos = mysqli_fetch_array($resultado_cursos)) {
    $nome_curso = $rows_cursos['nome'];
    $nome_fac = $rows_cursos['faculdade'];
    $nome_uni = $rows_cursos['universidade'];
    $ano_duracao=$rows_cursos['ano_duracao'];
    $descricao_curso=$rows_cursos['descricao'];
}
//print_r($id_c);
//print_r($id_i);
//die();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Curso Detalhes</title>
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
    </head>
    <body>

        <div class="super_container">
            <?php include_once './menu.php'; ?>



            <!-- Course -->
            <?php
            $id = (int) $_GET['id_curso'];
            $selecionarNoticias = $connexao->prepare("SELECT * FROM  curso_superior where id_curso = " . $id);
            $selecionarNoticias->execute();
            while ($noticias = $selecionarNoticias->fetch(PDO::FETCH_OBJ)) {
                ?>

                <div class="course">
                    <div class="container">
                        <div class="row">

                            <!-- Course -->
                            <div class="col-lg-12">

                                <div class="course_container">
                                    <div class="course_title text-center">
                                        <?php echo ($noticias->nome); ?> 
                                    </div>
                                </div>
                                <div class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start text-center">

                                    <!-- Course Info Item -->
                                    <div class="course_info_item">
                                        <div class="course_info_title">Universidade:</div>
                                        <div class="course_info_text"><a href="#"><?= $nome_uni ?></a></div>
                                    </div>

                                    <!-- Course Info Item -->
                                    <div class="course_info_item">
                                        <div class="course_info_title">faculdade:</div>
                                        <div class="course_info_text"><a href="#"><?= $nome_fac ?></a></div>
                                    </div>

                                </div>



                                <!-- Course Image -->
                                <div class="course_image"><img src="images/course_image.jpg" alt=""></div>

                                <!-- Course Tabs -->
                                <div class="course_tabs_container">
                                    <div class="tabs d-flex flex-row align-items-center justify-content-start">
                                        <div class="tab active">Descri????o</div>
                                        <div class="tab">Plano Curricular</div>
                                    </div>
                                    <div class="tab_panels">

                                        <!-- Description -->
                                        <div class="tab_panel active">
                                            <div class="tab_panel_title"><br>Informa????es Gerais:</div>
                                        <div class="course_info_text"><a href="#"><?= $descricao_curso ?></a></div>

                                           

                                            <div class="tab_panel_content">
                                                <div class="tab_panel_text">
                                                    <p></p>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Curriculum -->
                                        <div class="tab_panel tab_panel_2">
                                            <div class="tab_panel_content">
                                                <div class="tab_panel_title"></div>
                                                <div class="tab_panel_content">
                                                    <div class="tab_panel_text">
                                                        <p>1?? Ano<br> 



                                                            Metodologia de Investiga????o Cient??fica - Semestral<br>  

                                                            ??lgebra Linear e Geometria Anal??tica - Semestral  <br>

                                                            Introdu????o ?? Programa????o - Semestral  <br>

                                                            Introdu????o ?? Inform??tica - Semestral  <br>

                                                            Probabilidades e Estat??stica I - Semestral   <br>

                                                            Microprocessadores I - Semestral  <br>

                                                            Computa????o Num??rica - Semestral  <br>

                                                            Economia da Empresa I - Semestral   <br>

                                                            An??lise Matem??tica - Anual   <br>

                                                            F??sica - Anual   <br>



                                                            2?? Ano   <br>



                                                            Microprocessadores II - Semestral   <br>

                                                            Probabilidades e Estat??stica II - Semestral   <br>

                                                            Economia da Empresa II - Semestral   <br>

                                                            Introdu????o aos Sistemas de Informa????o - Semestral   <br>

                                                            Algoritmos e Estrutura de Dados - Semestral<br>

                                                            Sistemas Digitais - Semestral  <br>

                                                            Sistemas Operativos - Anual<br>   

                                                            Programa????o Orientada por Objectos - Anual   <br>

                                                            Tecnologia de Base de Dados - Anual   <br>



                                                            3?? Ano   <br>



                                                            Tecnologias Web - Semestral   <br>

                                                            Linguagens Formais e Aut??matos - Semestral   <br>

                                                            Circuitos El??ctricos - Semestral   <br>


                                                            An??lise e Projecto de Ling. de Programa????o - Semestral   <br>

                                                            Transmiss??o de dados - Semestral   <br>

                                                            Computa????o Gr??fica - Semestral   <br>

                                                            Sistemas Distribu??dos  - Anual   <br>

                                                            Redes de Computadores - Anual   <br>

                                                            Introdu????o ?? Intelig??ncia Artificial - Anual   <br>



                                                            4?? Ano   <br>



                                                            Engenharia de Software - Semestral   <br>

                                                            Compiladores  - Semestral   <br>

                                                            Programa????o Web - Semestral   <br>

                                                            Sistemas de Informa????o - Semestral   <br>

                                                            Metod. de An??lise e Desenvolvimento - Semestral   <br>

                                                            Projectos de Circuitos Integrados Digitais - Semestral   <br>

                                                            Infraestruturas - Semestral   <br>

                                                            Complementos de Programa????o - Semestral   <br>

                                                            Seguran??a de Redes Inform??ticas - Anual   <br>

                                                            Investiga????o Operacional - Anual   <br>



                                                            5?? Ano   <br>



                                                            Organiza????o e Gest??o de Projectos - Semestral   <br>

                                                            Computa????o M??vel  - Semestral   <br>

                                                            Engenharia do Conhecimento - Semestral   <br>

                                                            Multim??dia - Semestral  <br>

                                                            Teoria dos Mercados e Organiza????es - Semestral   <br>

                                                            Internet e Com??rcio Electr??nico - Semestral   <br>

                                                            Projecto e Disserta????o - Projecto <br>


                                                        </p>
                                                    </div>
                                                <?php } ?>
                                                <!-- Dropdowns -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reviews -->
                                    <div class="tab_panel tab_panel_3">
                                        <div class="tab_panel_title"></div>

                                        <!-- Rating -->
                                        <div class="review_rating_container">
                                            <div class="review_rating">
                                                <div class="review_rating_num"></div>
                                                <div class="review_rating_stars">
                                                    <div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div>
                                                </div>
                                                <div class="review_rating_text"></div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Course Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar">

                            <!-- Feature -->
                            <div class="sidebar_section">
                                <div class="sidebar_section_title">Detalhes</div>
                                <div class="sidebar_feature">
                                    <div class="course_price">KZ 180</div>

                                    <!-- Features -->
                                    <div class="feature_list">

                                        <!-- Feature -->
                                        <div class="feature d-flex flex-row align-items-center justify-content-start">
                                            <div class="feature_title"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Dura????o:</span></div>
                                            <div class="feature_text ml-auto" style="margin-left: 50px"><?= $ano_duracao ?> anos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          

                        </div>
                    </div>
                </div>
            </div>
        </div>

    

        <!-- Footer -->

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
                                                <li>Phone:  +(244) 933 627 550</li>
 <li>   <i class="fa fa-map-marker"> Rua Comandante Valodia/ Luanda, Angola</i> </li>                                            </ul>
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
                            <div class="cr_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos Direitos Reservados| Sistema desenvolvido por<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">BDRC</a>

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