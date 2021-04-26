<?php 
session_start();
include ("conexao.php");
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
        <link rel="stylesheet" type="text/css" href="styles/contact.css">
        <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
        <link rel="shortcut icon" href="images/favicon.png">
    </head>
    <body>

        <div class="super_container">

            <!-- Header -->
                <?php include_once './menu.php'; ?>
<br><br>


  

                <div class="contact_info_container">
                    <div class="container"><br>
    <?php 
        if (isset($_SESSION['contacto'])) {

            echo $_SESSION['contacto'];
            unset($_SESSION['contacto']);
            echo "<script>
            setTimeout(() => {
                
                $('.txe').fadeOut(1100);
                
            }, 3100);
        </script>";
        }else{}
   
   
   ?>
                        <div class="row">

                            <!-- Contact Form -->
                            <div class="col-lg-12">
                                <div class="contact_form">
                                    <div class="contact_info_title">Contactar o  <div class="logo_text">SOA<span>PRO</span></div>
                                        <form action="processa/proc_cad_contacto.php" method="POST" class="comment_form">
                                            <div>
                                                <div class="form_title">Nome</div>
                                                <input type="text" class="comment_input" name="nome"  placeholder="Seu Nome" required="required">
                                            </div>
                                            <div>
                                                <div class="form_title">Email</div>
                                                <input type="email" class="comment_input" name="email" placeholder="exemplo@hotmail.com" required="required">
                                            </div>
                                            <div>
                                                <div class="form_title">Assunto</div>
                                                <input type="text" class="comment_input" name="assunto" placeholder="porquê nos contactar?" required="required">
                                            </div>
                                            <div>
                                                <div class="form_title">Mensagem</div>
                                                <textarea class="comment_input comment_textarea"  name="mensagem" placeholder="Escreva aqui sua inquietação" required="required"></textarea>
                                            </div>
                                            <div>
                                                <button style="margin-bottom: 30px;" type="submit" class="comment_button trans_200">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Contact Info -->

                            </div>

                            <!-- Contact Info -->

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
                                                    <li>Email: info.SigOAP@gmail.com</li>
                                                    <li>Telefone:  +(244) 933 627 550</li>
 <li>   <i class="fa fa-map-marker"> Rua Comandante Valodia/ Luanda, Angola</i> </li>                                                </ul>
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
        <script src="plugins/easing/easing.js"></script>
        <script src="plugins/parallax-js-master/parallax.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
        <script src="plugins/marker_with_label/marker_with_label.js"></script>
        <script src="js/contact.js"></script>
        
        
        <script src="styles/bootstrap4/popper.js"></script>
        <script src="styles/bootstrap4/bootstrap.min.js"></script>
        <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
        <script src="plugins/easing/easing.js"></script>
        <script src="plugins/parallax-js-master/parallax.min.js"></script>
        <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
        <script src="js/courses.js"></script>

        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script src="http://www.google.com/jsapi"></script>
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