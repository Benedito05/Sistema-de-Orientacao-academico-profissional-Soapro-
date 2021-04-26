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
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
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
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                                <div class="box-header">
                                </div>
                                <div class="col-md-12">
                                            <div class="box-footer left">
                                               
                                           <a href="listar_faculdade.php"><button type="button" class="btn btn-danger">Voltar</button></a>
                                            </div>
                                </div>
                                <?php
                                    $resultado = mysqli_query($conecta, "SELECT f.id_faculdade, f.nome as faculdade, cf.id_curso, cf.id_faculdade, c.nome as curso, c.id_curso

from faculdade as f 
join curso_faculdade as cf on cf.id_faculdade= f.id_faculdade
 join curso_superior as c on c.id_curso=cf.id_curso 
 where cf.id_faculdade=".$_GET['id_faculdade']);
                                $linhas = mysqli_num_rows($resultado);

                                // print_r($linhas);
                                // die();
                                ?>


                                <!-- /.box-header -->

                                <style>
                                    .ggg{
                                        position: absolute;
                                        top: 10%;
                                        padding: 20px;
                                        color: #fff;
                                        background-color: rgba(0, 150, 0, 1);
                                        text-align: center;
                                        left: 25%;
                                        width: 50%;
                                        border-radius: 7px;
                                    }
                                </style>
                                <?php 
                                if(isset($_SESSION['sc'])){
                                    echo $_SESSION['sc'];
                                    unset($_SESSION['sc']);
                                    header("refresh: 2.2");
                                }
                                ?>
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Faculdade </th>
                                                <th>Curso</th>
                                                <th>Accão</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                           
                                            $a = 1;
                                            while ($linhas = mysqli_fetch_array($resultado)) {
                                                echo "<tr>";
                                                echo "<td class=''>" . $a . "</td>";
                                                echo "<td class=''>" . $linhas['faculdade'] . "</td>";
                                                echo "<td class=''>" .  $linhas['curso'] . "</td>";
                                                ?>
                                            <td class="day past agileits w3layouts calendar-day-2015-11-01"> 


                                                <a href='processa/proc_apagar_faculdade_curso.php?id_curso=<?php echo $linhas['id_curso']?>'><button  type='button' class='btn btn-sm btn-danger' title="Cancelar Associação de cursos a Faculdade"><i class="fa fa-trash"></i></button></a>
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
                Todos os Direitos reservados Por <strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="">SOAPRO</a></strong>.

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
                        var recipientemail = button.data('whateveremail')
                        var recipientnivel = button.data('whatevernivel')

                        // Extract info from data-* attributes
                        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                        var modal = $(this)
                        modal.find('.modal-title').text('Editar  o seguinte Usuario: ' + recipientnome)
                        modal.find('#id_usuario').val(recipient)
                        modal.find('#recipient-name').val(recipientnome)
//                         modal.find('#inst-text').val(recipientinst)
                        modal.find('#recipient-email').val(recipientemail)
                        modal.find('#recipient-nivel').val(recipientnivel)
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
