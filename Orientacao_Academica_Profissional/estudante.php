<?php
session_start();
include_once("conexao.php");
require_once("seguranca.php");

$connexao = connexao();
//require_once ("seguranca.php");
//echo "  Bem-Vindo Estudante: " .$_SESSION['EstudanteNome'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Estudante</title>
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
    <link rel="stylesheet" type="text/css" href="styles/about.css">
    <link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    <link rel="shortcut icon" href="images/favicon.png">
</head>

<body>

    <div class="super_container">
        <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br>
        <!-- Header -->
        <?php include_once './menu.php'; ?>


    </div>


    <!-- About --><br> <!-- About --><br>
    <!-- About --><br>
    <!-- About --><br>


    <!-- Team -->
    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title_container text-center">
                        <h2 class="section_title">
                            <h2>
                                <div class="logo_text">SOA<span>PRO</span></div>
                            </h2>
                            <div class="section_subtitle">
                                <p>O Sistema que facilita sua escolha, te orienta, te proporciona com maior conforto e comodidade do seu lar as suas escolhas futuras a um click de sí.</p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row features_row">

                <!-- Features Item -->


                <!-- Features Item -->
                <?php
                $sqlread = "SELECT a.id_sup, b.id_medio, b.nome, c.id_curso, c.nome as nomecurso FROM sup AS a INNER JOIN curso_medio AS b INNER JOIN curso_superior AS c ON a.id_medio = b.id_medio AND a.id_curso = c.id_curso Where b.id_medio = $_SESSION[EstudanteId_medio]";
                try {
                    $read = $connexao->prepare($sqlread);
                    $read->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
                ?>

                    <div class="col-lg-3 feature_col">
                    <a href="ver_curso_faculdade_universidade.php?id_curso=<?php echo ($rs->id_curso); ?>">
                        <!-- <a href="curso.php?id_curso=<?php echo ($rs->id_curso); ?>&id_instituicao=<?php echo ($rs->id_instituicao); ?>"> -->
                            <div class="feature text-center trans_400">
                            
                           
                                <div class="feature_icon"><i style="color: #007bff" class="fa fa-graduation-cap fa-4x"></i> </div>
                                <br>
                                <h3 class="feature_title"><?php echo ($rs->nomecurso); ?></h3>

                                <a href="curso.php?id_curso=<?php echo ($rs->id_curso); ?>">
                                            <!-- <div class="">
                                                <p style="font-size: 100%;color: #0092ef;">Saber Mais..</p>
                                            </div> -->
                                        </a>
                                        <a href="ver_curso_faculdade_universidade.php?id_curso=<?php echo ($rs->id_curso); ?>">
                                            <div class="">
                                                <p style=" font-size: 100%;color:#778899;">Universidades/Instituto que administram o curso..</p>
                                            </div>
                                        </a>

                            </div>





                            
                    </div>
                <?php } ?>


                </select>
            </div>
        </div>
    </div>































    <!-- About --><br>
    <!-- About --><br>
    <!-- About --><br>
    <!-- About --><br>
    <br>
    <!-- About --><br>
    <!-- About --><br>
    <!-- About --><br>
    <br>
    <!-- About --><br>
    <!-- About --><br>
    <!-- About --><br>
    <!-- Counter -->


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
                                            <p>O Suporte que você Precisava para a escolha do seu curso.</p>
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
                                                <li>Telefone: +(244) 933 627 550</li>
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
                                                <li><a href="estudante.php">Home</a></li>
                                                <li><a href="sobre.php">Sobre</a></li>
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
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>