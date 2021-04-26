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
    <title>SISTEMA DE ORIENTAÇÃO ACADEMICA PROFISSIONAL</title>
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
                <?php if (isset($_SESSION['apagar_estudante'])) {

                    echo $_SESSION['apagar_estudante'];
                    unset($_SESSION['apagar_estudante']);

                    header("Refresh:2.1, listar_estudante_admin.php");
                }
                ?>
                 <!-- <?php
                    if (isset($_SESSION['edit_usuario'])) {
                        echo $_SESSION['edit_usuario'];
                        unset($_SESSION['edit_ususario']);
                        // header("Refresh:2.1, listar_estudante_admin.php");
                    }
                   ?>
                   <?php
                   if (isset($_SESSION['edit_usuario_erro'])) {
                        echo $_SESSION['edit_usuario_erro'];
                        unset($_SESSION['edit_ususario_erro']);
                        // header("Refresh:2.1, listar_estudante_admin.php");
                    }
                    ?>
                    -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listar Estudante</h3>
                    </div>
                    <div class="card-footer">
                        <a href="cad_estudante.php"><button type='button' class='btn btn-sm btn-primary'>Cadastrar</button></a>
                        <a href="gerarPDF.php" target="_blank"><button type='button' class='btn btn-sm btn-success'>Gerar Relatório</button></a>
                    </div>
                    <?php
                    $resultado = mysqli_query($conecta, "select e.id_estudante, e.nome, e.telefone, c.nome as curso, e.usuario  from estudante as e inner join curso_medio as c on e.id_medio=c.id_medio  ");
                    $linhas = mysqli_num_rows($resultado);
                    ?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Curso Medio</th>
                                    <th>Usuario</th>
                                    <th>Acções</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $a = 1;
                                while ($linhas = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td class=''>" . $a . "</td>";
                                    echo "<td class=''>" . $linhas['nome'] . "</td>";
                                    echo "<td class=''>" . $linhas['telefone'] . "</td>";
                                    echo "<td class=''>" . $linhas['curso'] . "</td>";
                                    echo "<td class=''>" . $linhas['usuario'] . "</td>";


                                ?>
                                    <td class="day past agileits w3layouts calendar-day-2015-11-01">


                                    <a href='#?&id_estudante=<?php echo $linhas['id_estudante']; ?>'><button type='button' class="btn btn-warning" title=" Editar Estudante" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $linhas['id_estudante']; ?>" data-whatevernome="<?php echo $linhas['nome']; ?>" data-whatevertelefone="<?php echo $linhas['telefone']; ?> "data-whateverusuario="<?php  echo $linhas['usuario'];?>"><i class="fa fa-edit"></i></button></a>
                                         <a href='processa/proc_apagar_estudante.php?id_estudante=<?php echo $linhas['id_estudante']; ?>'><button title="Eliminar Estudante" type='button' class='btn btn-sm btn-danger'><i class="fa fa-trash"></i></button></a>
                                        
                        
                                    <?php
                                    echo "</tr>";
                                    $a++;
                                }
                                    ?>
                            </tbody>

                        </table>
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

           
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Estudantes</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="processa/proc_edit_estudante.php">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nome do Usuário:</label>
                                            <input name="nome" type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <!--                                                    <div class="form-group">
                                                                                                            <label for="message-text" class="col-form-label">Nome da Universidade/Instituição:</label>
                                                                                                            <input name="nome_inst" type="text" class="form-control" id="inst-text"></textarea>
                                                                                                        </div>-->
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Telefone:</label>
                                            <input name="telefone" type="text" class="form-control" id="recipient-telefone">
                                        </div>
<!-- 
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Curso:</label>
                                            <input name="curso" type="text" class="form-control" id="recipient-curso">
                                        </div> -->
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Usuario:</label>
                                            <input name="usuario" type="text" class="form-control" id="recipient-usuario">
                                        </div>
                                        <input name="id_estudante" type="hidden" id="id_estudante">
                                        <input name="id_medio" type="hidden" id="id_medio">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
            var recipienttelefone = button.data('whatevertelefone')
            // var recipientcurso = button.data('whatevercurso')
            var recipientusuario = button.data('whateverusuario')

            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Editando   o estudante: ' + recipientnome)
            modal.find('#id_estudante').val(recipient)
            modal.find('#recipient-name').val(recipientnome)
            //                         modal.find('#inst-text').val(recipientinst)
            modal.find('#recipient-telefone').val(recipienttelefone)
            // modal.find('#recipient-curso').val(recipientcurso)
            modal.find('#recipient-usuario').val(recipientusuario)
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