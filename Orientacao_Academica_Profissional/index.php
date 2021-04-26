<?php
session_start();
include_once("conexao.php");
$connexao = connexao();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>SOAPRO</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">

  
    <link rel="shortcut icon" href="images/favicon.png">
</head>

<body>

    <div class="super_container">
        <?php include_once './menu.php';

        ?>



        <!-- Home -->

        <div class="home">
            <div class="home_slider_container">

                <!-- Home Slider -->
                <div class="owl-carousel owl-theme home_slider">

                    <!-- Home Slider Item -->
                    <div class="owl-item">
                        <div class="home_slider_background" style="background-image:url(images/danger.JPG)"></div>
                        <div class="home_slider_content">
                            <div class="container">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 
                        Home Slider Item -->
                    <div class="owl-item">
                        <div class="home_slider_background " style="background-image:url(images/fio.png)"></div>
                        <div class="home_slider_content">
                            <div class="container">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Home Slider Item -->
                    <div class="owl-item">
                        <div class="home_slider_background" style="background-image:url(images/Jovens-estudantes-1.jpg)"></div>
                        <div class="home_slider_content">
                            <div class="container">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Home Slider Nav -->

            <div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
            <div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
        </div>

        <!-- Features -->

        <div class="features">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center">
                            <h2 class="section_title"> Bem-Vindo ao <h2>
                                    <div class="logo_text">SOA<span>PRO</span></div>
                                </h2>
                                <div class="section_subtitle">
                                    <p>O Sistema que facilita sua escolha, te orienta, te proporciona com maior conforto e comodidade do seu lar as suas escolhas futuras a um click de sí.</p>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="row features_row">
                    <?php
                    $sqlread = "SELECT *from instituicao_sup  order by id_instituicao limit 4";
                    try {
                        $read = $connexao->prepare($sqlread);
                        $read->execute();
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }

                    while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
                    ?>


                        <!-- Features Item -->
                        <div class="col-lg-3 feature_col">
                            <a href="ver_curso_faculdade.php?id_instituicao=<?php echo ($rs->id_instituicao) ?>">
                                <div class="feature text-center trans_400">
                                    <div class="feature_icon"><img src="../admin/dist/img/uni_foto/<?php echo utf8_encode($rs->foto); ?>"></div>
                                    <br> <br> <br> <br>
                                    <h3 class="feature_title"> <?php echo ($rs->nome); ?></h3>

                                </div>
                            </a>
                        </div>




                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="courses_button trans_200"><a href="ver_IES.php">Ver todas Universidades</a></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Courses -->



        <!-- Counter -->



        <!-- Events -->


        <!-- Newsletter -->

        <div class="">
            <div class="">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center"> <br> <br>
                            <h2 class="section_title"> Nossos <h2>
                                    <div class="logo_text"><span>Parceiros</span></div>
                                </h2>
                                <div class="section_subtitle">
                                    <p>O Sistema que facilita sua escolha, te orienta,tem para sí parceiros que oferecem-lhe estagio e quem sabe emprego!</p>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row features_row">
                    <style>
                        .feature_col {
                            padding: 30px;
                        }
                    </style>
                    <!-- Features Item -->
                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="images/infosi.jpg" width="50%" alt=""></div>
                            <h3 class="feature_title"></h3>
                        </div>
                    </div>

                    <!-- Features Item -->
                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="images/ncr.jpg" width="50%" alt=""></div>
                            <h3 class="feature_title"></h3>
                        </div>
                    </div>

                    <!-- Features Item -->
                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="images/logo-unitel.png" width="50%" alt=""></div>
                            <h3 class="feature_title"></h3>
                        </div>
                    </div>

                    <!-- Features Item -->
                    <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="images/ministerio-educacao.jpg" width="50%" alt=""></div>
                            <h3 class="feature_title"></h3>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="images/SEPE.jpg" width="50%" alt=""></div>
                            <h3 class="feature_title"></h3>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="images/logo_minea_2018.png" width="50%" alt=""></div>
                            <h3 class="feature_title"></h3>
                        </div>
                    </div> -->

                    <!-- <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="images/sonangol2.png" width="50%" alt=""></div>
                            <h3 class="feature_title"></h3>
                        </div>
                    </div> -->

                    <!-- <div class="col-lg-3 feature_col">
                        <div class="feature text-center trans_400">
                            <div class="feature_icon"><img src="images/zap.jpg " width="50%" alt=""></div>
                            <h3 class="feature_title"></h3>
                        </div>
                    </div> -->

                </div>


            </div>
        </div> <br><br>

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
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="sobre.php">Sobre</a></li>
                                            <li><a href="contacto.php">Contactar</a></li>
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
                            </script> Todos Direitos Reservados| Sistema desenvolvido por<a href="" target="_blank"> BDRC</a>

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
    <script type="text/javascript">
        var comboGoogleTradutor = null; //Varialvel global

        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'pt',
                includedLanguages: 'pt,en,fr',
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
            }, 'google_translate_element');

            comboGoogleTradutor = document.getElementById("google_translate_element").querySelector(".goog-te-combo");
        }

        function changeEvent(el) {
            if (el.fireEvent) {
                el.fireEvent('onchange');
            } else {
                var evObj = document.createEvent("HTMLEvents");

                evObj.initEvent("change", false, true);
                el.dispatchEvent(evObj);
            }
        }

        function trocarIdioma(sigla) {
            if (comboGoogleTradutor) {
                comboGoogleTradutor.value = sigla;
                changeEvent(comboGoogleTradutor); //Dispara a troca
            }
        }
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>