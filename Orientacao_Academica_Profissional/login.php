<?php
session_start();
include_once("conexao.php");
// include_once ("menu.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
    <link rel="shortcut icon" href="images/favicon.png">
</head>

<body>
<div class="super_container">

<!-- Header -->
<?php include_once './menu.php'; ?>

<!-- Home -->






<div class="contact_info_container"><br><br><br><br>
                <div class="container">
                    <div class="row">
                        <?php
                        if (!empty($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            session_destroy();
                        }



                        ?>
                        <!-- Contact Form -->
                        <div class="col-lg-8 section_title_container text-center ">
                            <div class="contact_form ">
                                <div class="contact_info_title">Login</div>
                                <div class="login-box-body">
                                    <p class="login-box-msg">INICIAR SESSÃO</p>

                                    <p class="text-danger text-center" style="">

                                        <?php
                                        if (isset($_SESSION['login_erro'])) {
                                            echo $_SESSION['login_erro'];
                                            unset($_SESSION['login_erro']);
                                        } else {
                                        }


                                        if (isset($_SESSION['login1'])) {
                                            echo $_SESSION['login1'];
                                            unset($_SESSION['login1']);
                                            echo "<script>
                                                    setTimeout(() => {
                                                        
                                                        window.location.replace('estudante.php');
                                                        
                                                    }, 2100);
                                                </script>";
                                            // header("Refresh:2.1, estudante.php");
                                        } else {
                                        }

                                        if (isset($_SESSION['cad_usuario'])) {
                                            echo $_SESSION['cad_usuario'];
                                            unset($_SESSION['cad_usuario']);
                                            // header("Refresh:2.1, login.php");
                                        } else {
                                        }

                                        ?>





                                        <form action="Valida_Login.php" method="POST">

                                            <div>

                                                <input type="text" class="comment_input" name="usuario" placeholder="seu nome de acesso" required="required">

                                            </div>
                                            <br />
                                            <div>

                                                <input type="password" class="comment_input" name="senha" placeholder="Sua senha de acesso" required="required">
                                            </div>

                                            <div>
                                                <button type="submit" class="comment_button trans_200">Entrar</button>
                                                <button type="submit" class="comment_button trans_200"><a style="color: #fff;" href="cad_estudante.php">Registar-se</a></button>

                                            </div>



                                        </form>
                                        <br>
                                </div>
                            </div>

                            <!-- Contact Info -->

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
        <script src="styles/bootstrap4/popper.js"></script>
        <script src="styles/bootstrap4/bootstrap.min.js"></script>
        <script src="plugins/easing/easing.js"></script>
        <script src="plugins/parallax-js-master/parallax.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
        <script src="plugins/marker_with_label/marker_with_label.js"></script>
        <script src="js/contact.js"></script>
</body>

</html>