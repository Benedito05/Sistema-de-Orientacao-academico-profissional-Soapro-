<?php
session_start();
include_once("conexao.php");
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
    <link rel="stylesheet" type="text/css" href="styles/courses.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/dt/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/dt/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="images/favicon.png">
</head>
<body>

    <div class="super_container">

        <!-- Header -->
        <?php include_once './menu.php'; ?>

        <br><br> <br><br>
        <div class="features">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title_container text-center"> <br> <br> <br>
                            <h2 class="section_title"> Saídas Profissionais <h2>
                                    <div class="logo_text">SOA<span>PRO</span></div>
                                </h2>
                                <div class="section_subtitle">
                                    <p></p>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row features_row">

                    <!-- Features Item -->
                    <div class="col-lg-3 feature_col">

                    </div>

                    <!-- Features Item -->
                    <div class="col-lg-3 feature_col">

                    </div>

                    <!-- Features Item -->
                    <div class="col-lg-3 feature_col">

                    </div>

                    <!-- Features Item -->
                    <div class="col-lg-3 feature_col">

                    </div>

                </div>
            </div>
        </div>

        <div class="col-sm-12" width='80%'>
            <!-- /.box -->



            <div class="box">
                <div class="box">
                    <!-- <h3 class="box-title">Listar Cursos & suas Saídas Profissionais</h3> -->
                </div>


                <?php if (!isset($_SESSION['EstudanteId_estudante'])) { ?>


                    <?php
                        $resultado = mysqli_query($conecta, "select * from curso_superior order by 'id_curso'");
                        $linhas = mysqli_num_rows($resultado);
                        //                            
                        ?>
                <?php } else { ?>


                    <?php
                        $resultado = mysqli_query($conecta, "select  c.id_medio, c.nome as curso_medio, cs.nome, cs.ano_duracao, cs.id_curso as id_curso
  from curso_medio as c   join sup as s on c.id_medio=s.id_medio   join curso_superior as cs on cs.id_curso=s.id_curso where c.id_medio= " . $_SESSION['EstudanteId_medio'] . "");
                        $linhas = mysqli_num_rows($resultado);
                        //                            
                        ?>

                <?php } ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" width='100%' class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Cursos</th>
                                <th>Ano de Duração</th>
                                <th>Acções</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            while ($linhas = mysqli_fetch_array($resultado)) {
                                echo "<tr>";
                                echo "<td class=''>" . $linhas['nome']. "</td>";
                                echo "<td class=''>" . $linhas['ano_duracao'] . "</td>";
                                ?>

                                <td class="day past agileits w3layouts calendar-day-2015-11-01">


                                    <button type='button' name="modal" class='btn btn-sm btn-primary' data-toggle="modal" data-target="#exampleModal<?= $linhas['id_curso'] ?>">Visualizar</button></a>

                                    <div class="modal fade" id="exampleModal<?= $linhas['id_curso'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel" style="color:#000"> <?= $linhas['nome'] ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">


                                                    <form method="POST" action="processa/proc_cad_saida.php">
                                                        <div class="box-body">

                                                            <!-- /.box-header -->
                                                            <div class="box-body">
                                                                <table class="table table-bordered table-striped">
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
                                                                            if(!mysqli_num_rows($sel)){
                                                                                ?>
                                                                                <tr>
                                                                                    <td><p class="alert alert-warning">Sem saídas disponiveis de momento</p></td>
                                                                                </tr>
    
                                                                            <?php
                                                                            }else{
                                                                                while ($row = mysqli_fetch_assoc($sel)) {
                                                                                    ?>
                                                                                <tr>
                                                                                    <td><?= $row['nome_saida'] ?></td>
                                                                                </tr>
    
                                                                            <?php
                                                                                }
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

        </div>





        <div>

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

    <!-- Bootstrap 3.3.7 -->
    <script src="js/dt/jquery-3.3.1.js"></script>
    <script src="js/dt/jquery.dataTables.min.js"></script>
    <script src="js/dt/dataTables.bootstrap4.min.js"></script>


    <script>
        $(function() {
            $('#example1').DataTable();
        })
    </script>
</body>

</html>