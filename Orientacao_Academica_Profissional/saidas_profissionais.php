<?php
session_start();
include_once ("conexao.php");
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
        <link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
        <link rel="stylesheet" type="text/css" href="styles/courses.css">
        <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
        <link rel="shortcut icon" href="images/favicon.png">
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



                                            <li>
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                <div>info.SOAPRO@gmail.com</div>
                                            </li>


                                        </ul>
                                        <div class="top_bar_login ml-auto">
                                            <div  class="login_button"><a href="logout.php">Sair</a></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>				
                </div>

                <!-- Header Content -->
                <div class="header_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                    <div class="logo_container">
                                        <a href="estudante.php">
                                            <div class="logo_text">SOA<span>PRO</span></div>
                                        </a>
                                    </div>
                                    <nav class="main_nav_contaner ml-auto">
                                        <ul class="main_nav">
                                            <li><a href="estudante.php">Home</a></li>
                                            <li><a href="cursos.php">Cursos</a></li>
                                            <li><a href="ver_IES.php">Universidades</a></li>
                                            <li class="active"><a href="saidas_profissionais.php">Saidas profissionais</a></li>


                                        </ul>
                                        <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>
                                </div>
                                <div class="hamburger menu_mm">
                                    <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                </div>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
        </div>


                 <div class="col-sm-12" width='80%'>
                        <!-- /.box -->
                        <div class="box">
                            <div class="box">
                                <h3 class="box-title">Listar Perfis</h3>
                            </div>
                            <?php
                            $resultado = mysqli_query($conecta, "SELECT a.id_sup, b.id_medio, b.nome, c.ano_duracao, c.id_curso,  c.nome as nomecurso FROM sup AS a INNER JOIN curso_medio AS b INNER JOIN curso_superior AS c ON a.id_medio = b.id_medio AND a.id_curso = c.id_curso Where b.id_medio = $_SESSION[EstudanteId_medio]");
                            $linhas = mysqli_num_rows($resultado);
                            
                           
                            ?>
                            
                            <!-- /.box-header -->
                            <div class="box-body">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                
                                <table id="example1" width='100%' class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                         
                                            <th>Nome do Curso</th>
                                            <th>Ano de Duração</th>
                                            <th>Acções</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        while ($linhas = mysqli_fetch_array($resultado)) {
                                            echo "<tr>";
                                            echo "<td class=''>".$linhas['nomecurso']. "</td>";
                                            echo "<td class=''>".$linhas['ano_duracao']. "</td>";
                                            ?>
                                        <td class="day past agileits w3layouts calendar-day-2015-11-01"> 


                                            <button  type='button' name="modal" class='btn btn-sm btn-primary'data-toggle="modal" data-target="#exampleModal<?=$linhas['id_curso']?>">Visualizar</button></a>
                                               
                                        <div class="modal fade" id="exampleModal<?=$linhas['id_curso']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel" style="color:#000"> <?=$linhas['nome']?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <form  method="POST" action="processa/proc_cad_saida.php">
                                                                             <div class="box-body">
                                                                        
                                                                         <!-- /.box-header -->
                                                                         <div class="box-body">
                                                                             <table id="example1" class="table table-bordered table-striped">
                                                                                 <thead>
                                                                                     <tr>
                                                                                         <th style="color: #fff; background-color: #14bdee;">Saídas profissionais</th>
                                                                                     </tr>
                                                                                 </thead>
                                                                                 <tbody>
                                                                        <?php
                                                                         #$resultadoOther = mysqli_query($conecta, "select id_saida, nome As nome_curso, nome_saida  from curso_superior AS cs INNER JOIN  saida_profissional AS sp ON cs.id_curso=sp.id_curso WHERE id_curso = '$_linhas['id_curso']'");
                                                                         #$linhas = mysqli_num_rows($resultado);
                                                                        $d = $linhas['id_curso'];
                                                                        $sel = mysqli_query($conecta, "SELECT *FROM saida_profissional as s INNER JOIN curso_superior as c ON s.id_curso = c.id_curso WHERE c.id_curso = '$d'");
                                                                        
                                                                        while($row = mysqli_fetch_assoc($sel)){
                                                                        
                                                                         ?>
                                                                                     <tr>
                                                                                          <td><?=$row['nome_saida']?></td>
                                                                                     </tr>
                                                                                 
                                                                             <?php
                                                                             
                                                                        }
                                                                             ?>
                                                                                </tbody>
                                                                                    
                                                                             </table>
                                                                             
                                                                         </div>

                                                                             </div>
                                                             </form>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">fechar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php
                                            echo "</tr>";
                                        }
                                        ?>
                                        </tbody>

                                </table>
                            </div>

                            <!-- /.box-body -->
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
                                                <li>Email: info.SigOAP@gmail.com</li>
                                                <li>Telefone:  +(244) 933 627 550</li>
                                                <li>Rua Comandante Valodia/ Luanda, Angola</li>
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