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
    include_once "menu.php";
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->
                <?php
                if (isset($_SESSION['cad_fau'])) {
                    echo $_SESSION['cad_fau'];
                    unset($_SESSION['cad_fau']);
                    header("Refresh:2.1, listar_faculdade.php");
                }
                if(   isset($_SESSION['apagar_fau'])){
                    echo $_SESSION['apagar_fau'];
                    unset($_SESSION['apagar_fau']);
                    header("Refresh:2.1, listar_faculdade.php");
                }
              
                if(isset($_SESSION['afecta_faculdade2'])){
                    echo $_SESSION['afecta_faculdade2'];
                    unset($_SESSION['afecta_faculdade2']);
                    header("Refresh: 2.4, listar_faculdade.php");
                }
              
                
                if(isset($_SESSION['cancelar_afectacao'])){
                    echo $_SESSION['cancelar_afectacao'];
                    unset($_SESSION['cancelar_afectacao']);
                    header("Refresh: 2.4, listar_faculdade.php");
                }
                

                ?>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listar Faculdades</h3>
                    </div>
                    <div class="card-footer">
                        <a href="cad_faculdade_admin.php"><button type='button' class='btn btn-sm btn-primary'>Cadastrar</button></a>
                    </div>
                    <?php
                    $resultado = mysqli_query($conecta, "SELECT *from faculdade");
                    $linhas = mysqli_num_rows($resultado);

                    ?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Faculdades</th>
                                    <th>Acções</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $a = 1;
                                while ($linhas = mysqli_fetch_array($resultado)) {

                                    echo "<tr>";
                                    echo "<td class=''>" . $a . "</td>";
                                    echo "<td class=''>" .  $linhas['nome'] . "</td>";
                                    //                                                echo "<td class=''>" . $linhas['nome_inst'] . "</td>";
                                ?>
                                    <td class="day past agileits w3layouts calendar-day-2015-11-01">



                                        <a href='afectar_faculdade.php?id_faculdade=<?php echo $linhas['id_faculdade']; ?>'><button type='button ' class='btn  btn-info' title="Associar Faculdade a Universidade ou Instituto"><i class="fa fa-plus"></i></button></a>
                                        <a href='ver_curso_faculdade.php?id_faculdade=<?php echo $linhas['id_faculdade']; ?>'><button type='button' class='btn  btn-primary' data-toggle="tooltip" data-placement="left" title="Ver Cursos por Faculdade"><i class="fa fa-eye"></i></button></a>
                                        <a href='#?&id_faculdade=<?php echo $linhas['id_faculdade']; ?>'><button type='button' class="btn btn-warning text-info" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $linhas['id_faculdade']; ?>" data-whatevernome="<?php echo $linhas['nome']; ?>" data-toggle="tooltip" data-placement="left" title="Editar Faculdade"><i class="fa fa-edit"></i></button></a>
                                        <a href='processa/proc_apagar_faculdade.php?id_faculdade=<?php echo $linhas['id_faculdade']; ?>'><button type='button' data-toggle="tooltip" data-placement="left" class='btn  btn-danger' title="Apagar Faculdade"><i class="fa fa-trash"></i></button></a>



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
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Faculdades</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="processa/proc_edit_facu.php">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nome da Faculdade:</label>
                                            <input name="nome" type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <!--                                                    <div class="form-group">
                                                                                                            <label for="message-text" class="col-form-label">Nome da Universidade/Instituição:</label>
                                                                                                            <input name="nome_inst" type="text" class="form-control" id="inst-text"></textarea>
                                                                                                        </div>-->

                                        <!--                                                    <input name="id_instituicao" type="hidden" id="id_instituicao">-->
                                        <input name="id_faculdade" type="hidden" id="id_faculdade">
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
            var recipientinst = button.data('whateverinst')

            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Editar Faculdade de ' + recipientnome)
            modal.find('#id_faculdade').val(recipient)
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