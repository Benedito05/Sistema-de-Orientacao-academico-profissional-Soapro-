<?php
session_start();
include_once("conexao.php");
require_once("seguranca.php");
$connexao = connexao();

//require_once ("seguranca.php");
//echo "  Bem-Vindo Estudante: " .$_SESSION['EstudanteNome'];

$id = (isset($_POST['id_curso'])) ? $_POST['id_curso'] : (int) $_GET['id_curso'];

$sqlread = "SELECT a.id_ver, b.id_faculdade,b.nome as faculdade, cs.nome as curso , c.id_instituicao, c.sector, c.foto, c.nome as universidade 
FROM instituto_faculdade_curso AS a 
join curso_faculdade as cf on cf.id_curso_faculdade = a.id_curso_faculdade
join faculdade as b on b.id_faculdade = cf.id_faculdade
join instituicao_sup as c on c.id_instituicao = a.id_instituicao
join curso_superior as cs on cs.id_curso = cf.id_curso
where cs.id_curso = '" . $id . "' ";
try {
    $read = $connexao->prepare($sqlread);
    $read->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}

// print_r($read->fetch(PDO::FETCH_OBJ));
// die();



$faculdade_univerdade = '';
$show_cursos = '';



while ($rs = $read->fetch(PDO::FETCH_OBJ)) {


    $faculdade_univerdade = 'Universidades ou Institutos que administram o curso de: ' . $rs->curso . ' ';


    $show_cursos .= '    <div class="col-lg-6 course_col">
    <br><br>
    <div class="course">
        <a style="color: #000" href="curso.php?id_instituicao=' . $rs->id_instituicao . ' &id_curso=' . $id . '"> <p> <div class="course_image " ><img src="../admin/dist/img/uni_foto/' . $rs->foto . '"></div></p></a>
        <div class="course_body">
            
            <h3 class="course_title"><a style="color:#000" href="curso.php?id_instituicao=' . $rs->id_instituicao . '&id_curso=' . $id . ' ">' . $rs->universidade . '</a></h3>

            <div class="course_text">

                <a style="color: #000" href="curso.php?id_instituicao=' . $rs->id_instituicao . '>" <p>  Sector:  ' . $rs->sector . '</p></a>
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
    <link rel="shortcut icon" href="images/favicon.png">
</head>

<body>

    <div class="super_container">
        <br><br><br><br><br><br>
        <!-- Header -->
        <?php include_once './menu.php'; ?>


    </div>



    <div class="courses">
        <div class="container">

            <div class="row">



                <!-- Courses Main Content -->
                <div class="col-lg-12">
                    <br><br>
                    <div class="courses_container">
                        <div class="text-center" style="color: #000"><i class=""></i>
                            <h2><?= $faculdade_univerdade ?></h2>
                        </div>

                        <div class="row courses_row">


                            <br>


                            <p>
                                <!-- Course -->
                                <?= $show_cursos ?>

                            </p>

                            <!-- single-agent -->

                            <?php
                            if (empty($_GET['pag'])) {
                            } else {
                                $pag = $_GET['pag'];
                            }
                            if (isset($pag)) {
                                $_GET['pag'];
                            } else {
                                $pag = 1;
                            }
                            $quantidade = 4;
                            $inicio = ($pag * $quantidade) - $quantidade;

                            $sqlread = "SELECT a.id_ver, b.id_faculdade,b.nome as faculdade, cs.nome as curso , c.id_instituicao, c.nome as universidade 
                                    FROM instituto_faculdade_curso AS a 
                                    join curso_faculdade as cf on cf.id_curso_faculdade = a.id_curso_faculdade
                                    join faculdade as b on b.id_faculdade = cf.id_faculdade
                                    join instituicao_sup as c on c.id_instituicao = a.id_instituicao
                                    join curso_superior as cs on cs.id_curso = cf.id_curso
                                    order by nome desc limit $inicio, $quantidade";
                            try {
                                $read = $connexao->prepare($sqlread);
                                $read->execute();
                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }

                            while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
                            ?>


                            <?php } ?>


                            <!-- single-agent -->


                            <style type="text/css">
                                /* Paginação */

                                .paginas {
                                    width: 100%;
                                    padding: 10px 0px;
                                    text-align: center;
                                    background: #F9F9F9;
                                    height: auto;
                                    margin: 2px auto;
                                }

                                .paginas a {
                                    width: auto;
                                    padding: 4px 10px;
                                    background: #14BDEE;
                                    color: #333;
                                    margin: 0px 2.5px;
                                    text-decoration: none;
                                }

                                .paginas a:hover {
                                    text-decoration: none;
                                    background: #000;
                                    color: #fff;
                                }

                                <?php
                                if (isset($_GET['pag'])) {
                                    $num_pg = $_GET['pag'];
                                } else {
                                    $num_pg = 1;
                                }
                                ?>.paginas a.Ativo<?php echo $num_pg; ?> {
                                    background: #14BDEE;
                                    color: #fff;
                                }
                            </style>

                            <?php
                            $sql = "SELECT * from instituicao_view ";
                            try {
                                $result = $connexao->prepare($sql);
                                $result->execute();
                                $totalRegistros = $result->rowCount();
                            } catch (PDOException $e) {
                                echo "$e";
                            }
                            if ($totalRegistros <= $quantidade) {
                            } else {
                                $paginas = ceil($totalRegistros / $quantidade);
                                if ($pag > $paginas) {
                                    echo '<script language="JavaScript">
              location.href="ver_curso_faculdade_universidade.php?pag=1";
            </script>';
                                }
                                $links = 5;
                                if (isset($i)) {
                                } else {
                                    $i = '1';
                                }
                            ?>
                                <div class="paginas">
                                    <a href="ver_curso_faculdade_universidade.php?&pag=1">
                                        <</a> <?php
                                                if (isset($_GET['pag'])) {
                                                    $num_pg = $_GET['pag'];
                                                }
                                                for ($i = $pag - $links; $i <= $pag - 1; $i++) {
                                                    if ($i <= 0) {
                                                    } else {
                                                ?> <a href="ver_curso_faculdade_universidade.php?&pag=<?php echo $i; ?>" class="Ativo<?php echo $i; ?>"><?php echo $i; ?>
                                    </a>
                                    <i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                            <?php
                                                    }
                                                }
                            ?>

                            <a href="ver_curso_faculdade_universidade.php?&pag=<?php echo $pag ?>" class="Ativo<?php echo $i; ?>"><?php ?><?php echo $pag ?></a>

                            <?php
                                for ($i = $pag + 1; $i <= $pag + $links; $i++) {
                                    if ($i > $paginas) {
                                    } else {
                            ?>
                                    <a href="ver_curso_faculdade_universidade.php?&pag=<?php echo $i; ?>" class="Ativo<?php echo $i; ?>"><?php echo $i ?></a>
                            <?php
                                    }
                                }
                            ?>
                            <a href="ver_curso_faculdade_universidade.php?&pag=<?php echo $paginas; ?>">></a>
                                </div>
                            <?php }
                            ?>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->





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
                                            <div class="footer_logo_text">SIG<span>OAP</span></div>
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
                                            <li>Email: info.SigOAP@gmail.com</li>
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