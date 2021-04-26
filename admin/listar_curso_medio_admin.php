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

                <div class="box">
<?php 
if (isset($_SESSION['curso_medio'])){

    echo $_SESSION['curso_medio'];
    unset( $_SESSION['curso_medio']);
    header("refresh:2.1, listar_curso_medio_admin.php");
}

?>
<?php 
if (isset($_SESSION['afectacao'])){

    echo $_SESSION['afectacao'];
    unset( $_SESSION['afectacao']);
    header("refresh:2.1, listar_curso_medio_admin.php");
}

?>
<?php 
if(isset($_SESSION['cad_curso'])){

    echo $_SESSION['cad_curso'];
    unset($_SESSION['cad_curso']);
    header("refresh:2.1, listar_curso_medio_admin.php");
}

?>
  <?php 
                        if (isset($_SESSION['delafectmedio'])){

                            echo $_SESSION['delafectmedio'];
                            unset(	$_SESSION['delafectmedio']);
                            header("refresh:2.1, listar_curso_medio_admin.php");
                        }
                        
                        ?>
                    <div class="box-header">
                        <h3 class="box-title">Listar Cursos Médios</h3>
                    </div>
                    <div class="card-footer">
                        <a href="cad_curso_medio_admin.php"><button type='button' class='btn btn-sm btn-primary'>Cadastrar</button></a>
                    </div>
                    <?php
                    $resultado = mysqli_query($conecta, "select * from curso_medio order by 'id_medio'");
                    $linhas = mysqli_num_rows($resultado);
                    ?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Curso Médio</th>
                                    <th>Accão</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $a = 1;
                                while ($linhas = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td class=''>" . $a . "</td>";
                                    echo "<td class=''>" . $linhas['nome'] . "</td>";
                                    ?>
                                    <td class="day past agileits w3layouts calendar-day-2015-11-01">





                                        <a href='afectacao.php?id_medio=<?php echo $linhas['id_medio']; ?>'><button type='button' class='btn  btn-info' title="Associar ou Afectar Curso Superior ao Curso Médio"><i class="fa fa-university"></i></button></a>
                                        <a href='#?&id_medio=<?php echo $linhas['id_medio']; ?>'><button type='button' class="btn btn-warning" title="Editar Curso Médio" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $linhas['id_medio']; ?>" data-whatevernome="<?php echo $linhas['nome']; ?>"><i class="fa fa-edit"></i></button></a>
                                        <a href='processa/proc_apagar_curso_medio.php?id_medio=<?php echo $linhas['id_medio']; ?>'><button type='button' class='btn  btn-danger' title="Apagar Curso Médio"><i class="fa fa-trash"></i></button></a>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Curso Médio</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="processa/proc_editar_curso_medio.php">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nome do Curso:</label>
                                            <input name="nome" type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <!--                                                    <div class="form-group">
                                                                                                            <label for="message-text" class="col-form-label">Nome da Universidade/Instituição:</label>
                                                                                                            <input name="nome_inst" type="text" class="form-control" id="inst-text"></textarea>
                                                                                                        </div>-->

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

            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Editar  Curso Médio de : ' + recipientnome)
            modal.find('#id_medio').val(recipient)
            modal.find('#recipient-name').val(recipientnome)
            //                         modal.find('#inst-text').val(recipientinst)

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