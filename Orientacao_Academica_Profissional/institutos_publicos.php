<?php
session_start();
include_once("conexao.php");
$connexao = connexao();
$limit = 4;
$sql = "SELECT COUNT(id_instituicao) FROM instituicao_sup";
$rs_result = mysqli_query($conecta, $sql);
$row = mysqli_fetch_row($rs_result);
$total_records = $row[0];
$total_pages = ceil($total_records / $limit);
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
    <link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/courses.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
    <link rel="stylesheet" type="text/css" href="chosen/bootstrap-chosen.css">
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" id="font-awesome-style-css" href="https://www.phpflow.com/code/css/bootstrap3.min.css" type="text/css" media="all">
    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>

</head>

<body>

    <div class="super_container">

        <!-- Header -->
        <?php include_once './menu.php'; ?>

        <br><br>

        <div class="courses">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="courses_search_container">
                            <form action="curso.php" method="POST" id="courses_search_form" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
                                <!--<input  type="search"  class="courses_search_input" name="pesquisar" placeholder="Procurar Cursos" required="required"> !-->

                                <select name="id_curso" style="width: 100%" id="id_universidade" class=" chosen-select">

                                    <option>Pesquise por instituto Público </option>

                                    <?php
                                    $result_fau = "SELECT * FROM instituicao_sup where sector='Publica' AND id_tipo=2  ORDER BY id_instituicao";
                                    $resultado_fau = mysqli_query($conecta, $result_fau);
                                    while ($row_cat = mysqli_fetch_assoc($resultado_fau)) {
                                        echo '<option value="' . $row_cat['id_instituicao'] . '">' . utf8_decode($row_cat['nome']) . ' | Email: ' . $row_cat['email'] . ' </option>';
                                    }
                                    ?>


                                </select>

                                <button action="submit" class="btn btn-info ">Pesquisar </button>
                            </form>

                        </div>
                    </div>
                    <br><br><br>

                    <!-- Courses Main Content -->
                    <div>
                        <div id="target-content">carregando...</div>
                        <div class="col-lg-12" style="margin-left: 40%; text-align: center">
                            <div class="sidebar">

                                <ul class='pagination text-center' id="pagination">
                                    <?php if (!empty($total_pages)) : for ($i = 1; $i <= $total_pages; $i++) :
                                            if ($i == 1) : ?>
                                                <li class='active' id="<?php echo $i; ?>"><a href='pagination4.php?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
                                            <?php else : ?>
                                                <li id="<?php echo $i; ?>"><a href='pagination4.php?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
                                            <?php endif; ?>
                                    <?php endfor;
                                    endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Newsletter -->



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
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="js/courses.js"></script>
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

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="http://www.google.com/jsapi"></script>










</body>
<script>
    jQuery(document).ready(function() {
        jQuery("#target-content").load("pagination4.php?page=1");
        jQuery("#pagination li").live('click', function(e) {
            e.preventDefault();
            jQuery("#target-content").html('loading...');
            jQuery("#pagination li").removeClass('active');
            jQuery(this).addClass('active');
            var pageNum = this.id;
            jQuery("#target-content").load("pagination4.php?page=" + pageNum);
        });
    });
</script>
</html>