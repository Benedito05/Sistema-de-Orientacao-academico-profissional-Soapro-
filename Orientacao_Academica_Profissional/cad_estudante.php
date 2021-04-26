<?php
session_start();
//require_once("seguranca.php");
include_once("conexao.php");

//echo "Bem-Vindo Administrador/a : " . $_SESSION['AdminNome'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastrar Estudante</title>
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
    <link rel="stylesheet" type="text/css" href="chosen/bootstrap-chosen.css">
    <link rel="stylesheet" type="text/css" href="styles/about_responsive.css">


    <link rel="shortcut icon" href="images/favicon.png">
</head>

<body>

    <div class="super_container">

        <!-- Header -->
        <!-- <?php include_once './menu.php'; ?> -->

        <!-- Home -->



        <div class="home">
            <div class="breadcrumbs_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li>Registar-se</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="counter">
            <div class="counter_background" style="background-image:url(images/newsletter.jpg)"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="counter_content">
                            <h2 class="counter_title">Registos actualizados</h2>
                            <div class="counter_text">
                                <p>Regista-te e Junte-se a mais nova plataforma de orientação académica profissional de Angola, descubra seu talento!</p>
                            </div>

                            <!-- Milestones -->

                            <div class="milestones d-flex flex-md-row flex-column align-items-center justify-content-between">

                                <!-- Milestone -->
                                <?php
                                $resultado = mysqli_query($conecta, "select * from estudante order by 'id_estudante'");
                                $linhas = mysqli_num_rows($resultado);
                                ?>
                                <div class="milestone">

                                    <div class="milestone_counter" style="color: #FFFFFF " data-end-value="" data-sign-before="+"><?php echo $linhas; ?></div>

                                    <div class="milestone_text">Estudantes</div>
                                </div>

                                <!-- Milestone -->
                                <div class="milestone">
                                    <?php
                                    $resultado2 = mysqli_query($conecta, "select * from  instituicao_sup order by id_instituicao");
                                    $linhas1 = mysqli_num_rows($resultado2);
                                    ?>
                                    <div class="milestone_counter" style="color: #FFFFFF " data-end-value="" data-sign-before="+"> <?php echo $linhas1; ?></div>
                                    <div class="milestone_text">Universidades</div>
                                </div>

                                <!-- Milestone -->
                                <div class="milestone">
                                    <?php
                                    $resultado3 = mysqli_query($conecta, "select * from  curso_superior order by id_curso");
                                    $linhas2 = mysqli_num_rows($resultado3);
                                    ?>
                                    <div class="milestone_counter" style="color: #FFFFFF " data-end-value="" data-sign-before="+"><?php echo $linhas2; ?></div>
                                    <div class="milestone_text">Cursos</div>
                                </div>

                                <!-- Milestone -->


                            </div>
                        </div>

                    </div>
                </div>


                <div class="counter_form">
                    <div class="row fill_height">
                        <div class="col fill_height">
                            <form class="counter_form_content d-flex flex-column align-items-center justify-content-center" action="processa/proc_cad_estudante.php" method="POST">
                                <div class="counter_form_title">Registar-se</div>
                                <input type="text" class="counter_input" name="nome" placeholder="Seu Nome Completo:" required="required">
                                <input type="tel" class="counter_input" name="telefone" placeholder="telefone:" required="required">
                                <select style="width: 100%" class="counter_input chosen-select" id="country" required="required" name="id_medio">
                                    <option>Selecione seu Curso Médio </option>

                                    <?php
                                    $result_medio = "SELECT * FROM curso_medio ORDER BY id_medio";
                                    $resultado_medio = mysqli_query($conecta, $result_medio);
                                    while ($row_cat = mysqli_fetch_assoc($resultado_medio)) {
                                        echo '<option value="' . $row_cat['id_medio'] . '">' . $row_cat['nome'] . '</option>';
                                    }
                                    ?>


                                </select>
                                <input type="text" class="counter_input" name="usuario" placeholder="Seu Nome de Acesso:" required="required">
                                <input type="password" class="counter_input" name="senha" placeholder="Sua Senha de Acesso:" required="required">

                                <button type="submit" class="counter_form_button" data-toggle="modal" data-target="#exampleModal">Registar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Partners -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">SOAPRO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                            echo 'teste';
                            ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Ok</button>
                        </div>
                    </div>
                </div>
            </div> -->
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
    <script src="chosen/chosen.jquery.js"></script>
    <script>
        $('.chosen-select').chosen({
            width: '100%',
            placeholder_text: "Selecione uma opção...",
            no_results_text: "Oops, valor não encontrado!"
        });
    </script>


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
    <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="js/about.js"></script>
</body>

</html>