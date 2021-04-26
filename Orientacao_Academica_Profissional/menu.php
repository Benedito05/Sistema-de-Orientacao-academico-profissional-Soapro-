
<head>
<style type="text/css">
    #google_translate_element {
        display: none;
    }
    /*
    .goog-te-banner-frame {
        display: none !important;
    }
    body {
        position: static !important;
        top: 0 !important;
    }
    */
</style>

<style type="text/css">
    #google_translate_element {
        display: none;
    }
    .goog-te-banner-frame {
        display: none !important;
    }
    body {
        position: static !important;
        top: 0 !important;
    }
</style>
<!--[if lt IE 9]>
    <script src="javascript/html5shiv.js"></script>
    <script src="javascript/respond.min.js"></script>
<![endif]-->
<style>
    
    .dropdown:hover>.dropdown-menu{
        
        display: block;
    }
    </style>
    <link rel="shortcut icon" type="images/x-icon" href="images/faveicon.jpg">
</head>

<div id="google_translate_element" class="boxTradutor"></div>

</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->
            <div class="top_bar">
                <div class="top_bar_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                                    <ul class="top_bar_contact_list">

                                        <?php if (!isset($_SESSION['EstudanteId_estudante'])) { ?>
                                            <li>
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                                <div>+244-933-627-550</div>
                                            </li>
                                        <?php } else { ?>

                                            <li>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <div><?php echo "  Bem -Vindo Estudante: " . $_SESSION['EstudanteNome']; ?></div>
                                            </li>

                                            <li>
                                                <i class=" fa fa-graduation-cap" aria-hidden="true"></i>
                                                <div> <?php
                                                        $result_fau = "SELECT a.id_medio, a.nome FROM curso_medio AS a WHERE a.id_medio= $_SESSION[EstudanteId_medio]";
                                                        $resultado_fau = mysqli_query($conecta, $result_fau);
                                                        while ($row_cat = mysqli_fetch_assoc($resultado_fau)) {
                                                            echo '<option value="' . $row_cat['id_medio'] . '">' . $row_cat['nome'] . '</option>';
                                                        }
                                                        ?> </div>
                                            </li>

                                        <?php } ?>


                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <div>info.SOAPRO@gmail.com</div>
                                        </li>
                                    </ul>
                                    <div class="top_bar_login ml-auto">

                                        <?php if (!isset($_SESSION['EstudanteId_estudante'])) { ?>
                                            <div class="login_button"><a href="login.php">Registar ou Login</a></div>
                                        <?php } else { ?>
                                            <div class="login_button"><a href="logout.php">Sair</a></div>
                                        <?php } ?>


                                    </div>
                                    <div style="margin-left: 10px" class="social-icons">
                                        <span><a href="javascript:trocarIdioma('pt')" data-toggle="tooltip" data-placement="bottom" title="Português"><img src="images/Bandeiras/portugal.png"></a></span>
                                        <span><a href="javascript:trocarIdioma('en')" data-toggle="tooltip" data-placement="bottom" title="English"><img src="images/Bandeiras/united-kingdom-flag-icon-64.png"></a></span>
                                        <span><a href="javascript:trocarIdioma('fr')" data-toggle="tooltip" data-placement="bottom" title="France" href="#"><img src="images/Bandeiras/fr.png"></a></span>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- bandeiras:tradutor -->

            <!-- Header Content -->

            <div class="header_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <div class="logo_container">
                                    <a href=" <?php if (!isset($_SESSION['EstudanteId_estudante'])) { ?>
                                    
                                    index.php  
                                    <?php } else { ?>
                                                              estudante.php
                                    
                                    <?php } ?> ">
                                        <div class="logo_text">SOA<span>PRO</span></div>
                                    </a>
                                </div>
                                <nav class="main_nav_contaner ml-auto">
                                    <ul class="main_nav">
                                        <li class="active"><a href="
                                        <?php if (!isset($_SESSION['EstudanteId_estudante'])) { ?>
                                                              index.php
                                                          <?php } else { ?>
                                                              estudante.php
                                                          <?php } ?>">Home</a>
                                        </li>

                                        <?php if (!isset($_SESSION['EstudanteId_estudante'])) { ?>
                                            <li><a href="sobre.php">Sobre</a></li>
                                        <?php } ?>

                                        <li><a href="cursos.php">Cursos</a></li>






                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Universidades/Institutos
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <li> <a class=" main_nav dropdown-item" href="uni_privadas.php">Universidades-Privadas </a>
                                                    <a class="dropdown-item" href="uni_publicas.php">Universidades-Públicas</a>
                                                    <a class="dropdown-item" href="institutos_privados.php">Institutos-Privados</a>
                                                    <a class="dropdown-item" href="institutos_publicos.php">Institutos-Públicos</a>
                                                    <a class="dropdown-item" href="ver_IES.php">Instituições académicas</a></li>


                                            </ul>
                                        </li>
                                        <li><a href="perfis.php">Saídas Profissionais</a></li>


                                        <li><a href="contacto.php">Contactos</a></li>


                                    </ul>


                                    <!-- Hamburger -->


                                    <div class="hamburger menu_mm">
                                        <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                    </div>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Search Panel -->


            <!-- Menu -->

            <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
                <div class="menu_close_container">
                    <div class="menu_close">
                        <div></div>
                        <div></div>
                    </div>
                </div>
               
                <nav class="menu_nav">
                    <ul class="menu_mm">
                        <li class="active"><a href="
                                        <?php if (!isset($_SESSION['EstudanteId_estudante'])) { ?>
                                                              index.php
                                                          <?php } else { ?>
                                                              estudante.php
                                                          <?php } ?>">Home</a>
                        </li>
                        <?php if (!isset($_SESSION['EstudanteId_estudante'])) { ?>
                            <li><a href="sobre.php">Sobre</a></li>
                        <?php } ?>

                        <li><a href="cursos.php">Cursos</a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Universidades/Institutos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li> <a class=" main_nav dropdown-item" href="uni_privadas.php">Universidades-Privadas </a>
                                    <a class="dropdown-item" href="uni_publicas.php">Universidades-Públicas</a>
                                    <a class="dropdown-item" href="institutos_privados.php">Institutos-Privados</a>
                                    <a class="dropdown-item" href="institutos_publicos.php">Institutos-Públicos</a>
                                    <a class="dropdown-item" href="ver_IES.php">Instituições académicas</a></li>


                            </ul>
                        </li>
                        <li><a href="perfis.php">Saídas Profissionais</a></li>

                        <?php if (!isset($_SESSION['EstudanteId_estudante'])) { ?>
                            <li><a href="contacto.php">Contactos</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>

            <!-- Home -->


            <!-- Footer -->


        </header>


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


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/tether.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/animsition.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/countto.js"></script>
<script src="assets/js/equalize.min.js"></script>
<script src="assets/js/jquery.isotope.min.js"></script>
<script src="assets/js/owl.carousel2.thumbs.js"></script>

<script src="assets/js/jquery.cookie.js"></script>
<script src="assets/js/gmap3.min.js"></script>
<script src="assets/js/googleapis.js"></script>
<script src="assets/js/shortcodes.js"></script>
<script src="assets/js/main.js"></script>


<!-- Revolution Slider -->
<script src="includes/rev-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="includes/rev-slider/js/jquery.themepunch.revolution.min.js"></script>
<script src="assets/js/rev-slider.js"></script>
<!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
<script src="includes/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script src="includes/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="includes/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="includes/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="includes/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script src="includes/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="includes/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="includes/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="includes/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
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
                    changeEvent(comboGoogleTradutor);//Dispara a troca
                }
            }
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

<!-- Mirrored from corpthemes.com/html/autora/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Sep 2019 11:33:49 GMT -->

</html>