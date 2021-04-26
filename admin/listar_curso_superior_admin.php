<!DOCTYPE html>
<?php
session_start();
include_once("seguranca.php");
include_once("conexao.php");
//ini_set('error_reporting', 0);
//echo "Bem-Vindo Administrador/a : " . $_SESSION['AdminNome'];
?>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:59:08 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SOAPRO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="ckeditor/ckeditor.js">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="shortcut icon" href="dist/img/favicon.png">


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <?php
    include "menu.php";
    ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->
                <?php
                if (isset($_SESSION['curso_superior'])) {

                    echo $_SESSION['curso_superior'];
                    unset($_SESSION['curso_superior']);
                    header("refresh:2.1, listar_curso_superior_admin.php");
                }

                ?>
                <?php
                if (isset($_SESSION['elimina_superior'])) {

                    echo $_SESSION['elimina_superior'];
                    unset($_SESSION['elimina_superior']);
                    header("refresh:2.1, listar_curso_superior_admin.php");
                }

                ?>

                <?php
                if (isset($_SESSION['afecta_curso_faculdade'])) {

                    echo $_SESSION['afecta_curso_faculdade'];
                    unset($_SESSION['afecta_curso_faculdade']);
                    header("refresh:2.1, listar_curso_superior_admin.php");
                }




                if (isset($_SESSION['saida'])) {

                    echo $_SESSION['saida'];
                    unset($_SESSION['saida']);
                    header("refresh:2.1, listar_curso_superior_admin.php");
                }
                if (isset($_SESSION['apagar_curso_faculdade'])) {

                    echo $_SESSION['apagar_curso_faculdade'];
                    unset($_SESSION['apagar_curso_faculdade']);
                    header("refresh:2.1, listar_curso_superior_admin.php");
                }
                if (isset($_SESSION['cad_saida'])) {

                    echo $_SESSION['cad_saida'];
                    unset($_SESSION['cad_saida']);
                    header("refresh:2.1, listar_curso_superior_admin.php");
                }

                ?>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listar Cursos Superiores</h3>
                    </div>
                    <div class="card-footer">
                        <a href="cad_curso_superior_admin.php"><button type='button' class='btn btn-sm btn-primary'>Cadastrar</button></a>
                        <a href="cursosPDF.php" target="_blank"><button type='button' class='btn btn-sm btn-success'>Gerar Relatório</button></a>

                    </div>

                    <?php
                    $resultado = mysqli_query($conecta, "SELECT  * from curso_superior order by  nome ASC ");
                    $linhas = mysqli_num_rows($resultado);
                    ?>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cursos</th>
                                    <th>Ano de duração</th>
                                    <th>Descrição</th>
                                    <th>Accão</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                $a = 1;
                                while ($linhas = mysqli_fetch_array($resultado)) {
                                    if (strlen($linhas['descricao']) > 60) {
                                        $ret = "...";
                                    } else {
                                        $ret = "";
                                    }
                                    echo "<tr>";
                                    echo "<td class=''>" . $a . "</td>";
                                    echo "<td class=''>" .  $linhas['nome'] . "</td>";

                                    echo "<td class=''>" . $linhas['ano_duracao'] . "</td>";
                                    echo "<td class=''>" . substr($linhas['descricao'], 0,50) . $ret . "</td>";
                                ?>


                                    <td class="day past agileits w3layouts calendar-day-2015-11-01">
                                        <a href='#'><button type='button' class='btn btn-success' title="Ver CONTEÚDO" data-toggle="modal" data-target="#viewModal" data-whatever="<?php echo $linhas['id_curso']; ?>" data-whatevernome="<?php echo $linhas['nome']; ?>" data-whateverano_duracao="<?php echo $linhas['ano_duracao']; ?>" data-whateverdescricao="<?php echo $linhas['descricao']; ?>"><i class="fa fa-eye"></i></button></a>
                                        <a href='afectar_curso_faculdade.php?&id_curso=<?php echo $linhas['id_curso']; ?>'><button type='button' class='btn btn-info' title="Associar ou afectar Curso a Uma Faculdade"><i class="fa fa-university"></i></button></a>

                                        <a href='listar_saida-profissionais_admin.php?&id_curso=<?php echo $linhas['id_curso']; ?>&curso=<?php echo $linhas['nome']; ?>'><button type='button' class='btn  btn-primary ' title="Associar  saída profissional ao Curso"><i class="fa fa-suitcase"></i></button></a>
                                        <a href='#?&id_curso=<?php echo $linhas['id_curso']; ?>'><button type='button' class="btn btn-warning" title="Editar Curso" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $linhas['id_curso']; ?>" data-whatevernome="<?php echo $linhas['nome']; ?>" data-whateverano_duracao="<?php echo $linhas['ano_duracao']; ?>" data-whateverdescricao="<?php echo  $linhas['descricao']; ?>"><i class="fa fa-edit"></i></button></a>
                                        <a href='processa/proc_apagar_curso_sup.php?id_curso=<?php echo $linhas['id_curso']; ?>'><button type='button' title="Apagar Curso" class='btn btn-danger'><i class="fa fa-trash"></i></button></a>
                                    <?php
                                    echo "</tr>";
                                    $a++;
                                }
                                    ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Curso</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="processa/proc_edit_sup.php">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Curso:</label>
                                            <input name="nome" type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Ano de Duração:</label>
                                            <input name="ano_duracao" type="text" class="form-control" id="ano_duracao"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label for="message-text" class="col-form-label">Descrição:</label>
                                            <textarea  name="descricao" class="form-control" id="descricao"></textarea>  -->
                                            <label for="exampleimputname">Descricão:</label>
                                            <textarea  style="resize:none; height: 140px"  name="descricao" class="form-control "  id="descricao"></textarea>

                                        </div>

                                        <input name="id_curso" type="hidden" id="id_curso">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewModal">Ver Curso</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Curso:</label>
                                        <input name="nome" type="text" class="form-control" id="recipient-name" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Ano de Duração:</label>
                                        <input name="ano_duracao" type="text" class="form-control" id="ano_duracao" disabled></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Descrição:</label>
                                        <textarea style="resize:none; height: 140px" name="descricao" class="form-control " id="descricao" disabled></textarea>
                                    </div>
                                    <input name="id_curso" type="hidden" id="id_curso">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    <footer class="main-footer">
        <div class="pull-left hidden-xs">

        </div>
        Todos os Direitos reservados Por <strong>Copyright &copy;<script>
                document.write(new Date().getFullYear());
            </script> <a href="">SOAPRO</a></strong>.

    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever')
            var recipientnome = button.data('whatevernome')
            var recipientano_duracao = button.data('whateverano_duracao')
            var recipientdescricao = button.data('whateverdescricao')
            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Editar Curso de ' + recipientnome)
            modal.find('#id_curso').val(recipient)
            modal.find('#recipient-name').val(recipientnome)
            modal.find('#ano_duracao').val(recipientano_duracao)
            modal.find('#descricao').val(recipientdescricao)
        })
        $('#viewModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever')
            var recipientnome = button.data('whatevernome')
            var recipientano_duracao = button.data('whateverano_duracao')
            var recipientdescricao = button.data('whateverdescricao')
            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Ver Curso de ' + recipientnome)
            modal.find('#id_curso').val(recipient)
            modal.find('#recipient-name').val(recipientnome)
            modal.find('#ano_duracao').val(recipientano_duracao)
            modal.find('#descricao').val(recipientdescricao)
        })
    </script>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:59:12 GMT -->

</html>