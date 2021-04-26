<?php
session_start();
require_once("seguranca.php");
include_once("conexao.php");

//echo "Bem-Vindo Administrador/a : " . $_SESSION['AdminNome'];
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Mirrored from adminlte.io/themes/AdminLTE/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:57:18 GMT -->
    <!-- Added by HTTrack -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
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
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="dist/img/favicon.png">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

    <script src="dist/js/bootstrap.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- 
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajax({
                url: "data.php",
                dataType: "JSON",
                success: function(result) {
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(function() {
                        drawChart(result);
                    });
                }
            });

            function drawChart(result) {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Name');
                data.addColumn('number', 'Quantity');
                var dataArray = [];
                $.each(result, function(i, obj) {
                    dataArray.push([obj.name, parseInt(obj.quantity)]);
                });

                data.addRows(dataArray);

                var piechart_options = {
                    title: 'Pie Chart: How Much Products Sold By Last Night',
                    width: 400,
                    height: 300
                };
                var piechart = new google.visualization.PieChart(document
                    .getElementById('piechart_div'));
                piechart.draw(data, piechart_options);

                var barchart_options = {
                    title: 'Barchart: How Much Products Sold By Last Night',
                    width: 400,
                    height: 300,
                    legend: 'none'
                };
                var barchart = new google.visualization.ColumnChart(document
                    .getElementById('lineChart_div'));
                barchart.draw(data, barchart_options);
            }

        });
    </script> -->
</head>

<body class="hold-transition skin-blue sidebar-mini">


    <?php
    include "menu.php";
    ?>


    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="dist/img/usa.png" alt="User profile picture">

                        <h3 class="profile-username text-center"><?php echo " " . $_SESSION['AdminNome'];
                                                                    ?></h3>



                        <h4 class="text-muted text-center"><?php echo " " . $_SESSION['AdminNivel_Acesso']; ?></h4>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <?php
                                $resultado = mysqli_query($conecta, "select * from curso_superior order by 'id_curso'");
                                $linhas = mysqli_num_rows($resultado);
                                ?>

                                <b>Total Curso Superior:</b> <a class="pull-right"><?php echo $linhas ?></a>
                            </li>
                            <?php if ($_SESSION['AdminNivel_Acesso'] == "Administrador") { ?>
                                <li class="list-group-item">
                                    <?php
                                    $resultado1 = mysqli_query($conecta, "select * from usuarios order by 'id_usuario'");
                                    $linhas1 = mysqli_num_rows($resultado1);
                                    ?>
                                    <b>Total de Usuarios do Sistema:</b> <a class="pull-right"><?php echo $linhas1 ?></a>
                                </li>
                            <?php } ?>
                            <li class="list-group-item">
                                <?php
                                $resultado2 = mysqli_query($conecta, "select * from instituicao_sup order by 'id_instituicao'");
                                $linhas2 = mysqli_num_rows($resultado2);
                                ?>

                                <b>Total de Instituições Superiores:</b> <a class="pull-right"><?php echo $linhas2 ?></a>
                            </li>
                        </ul>
                        <?php
                        $resultado = mysqli_query($conecta, "select * from usuarios order by 'id_usuario'");
                        $linhas = mysqli_num_rows($resultado);
                        ?>


                        <a href='#?&id_usuario=<?php echo "" . $_SESSION['AdminId']; ?>'><i title=" Editar Perfil" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo "" . $_SESSION['AdminId']; ?>" data-whatevernome="<?php echo " " . $_SESSION['AdminNome'];
                                                                                                                                                                                                                                                ?>" data-whateverusuario="<?php echo " " . $_SESSION['AdminUsuario'];
                                                                                                                                                                                                            ?>" data-whateversenha="<?php echo " " . $_SESSION['AdminSenha'];
                                                                                                                        ?>" data-whateveremail="<?php echo " " . $_SESSION['AdminEmail'];
                                                                                                                    ?>"><b class="btn btn-warning btn-block">Editar Perfil</b> </i></a>

                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->

                <!-- About Me Box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <!-- <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li> -->

                        <li><a href="#settings" data-toggle="tab">Seus Dados</a></li>
                    </ul>


                    <!-- /.tab-pane -->

                    <!-- /.tab-pane -->



                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Nome</label>

                                <div class="col-sm-10">
                                    <input type="text" name="nome" class="form-control" id="inputName" placeholder="<?php echo "" .  $_SESSION['AdminNome']; ?> " readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Usuário</label>

                                <div class="col-sm-10">
                                    <input type="text" name="usuario" class="form-control" id="inputName" placeholder="<?php echo "" .  $_SESSION['AdminUsuario']; ?> " readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Senha</label>

                                <div class="col-sm-10">
                                    <input type="password" name="senha" class="form-control" id="inputName" placeholder="<?php echo "**********";?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder=" <?php echo "" .  $_SESSION['AdminEmail']; ?>" readonly>
                                </div>

                            </div>





                            <!-- <div class="form-group">
                                <div class="col-sm-offset-6 col-md-18">
                                    <button type="button" class="btn btn-warning">Editar</button>
                                </div>
                            </div> -->

                            <div class="form-group">

                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="processa/proc_edit_perfil.php">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nome :</label>
                                            <input name="nome" type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Usuário:</label>
                                            <input name="usuario" type="text" class="form-control" id="recipient-usuario">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Email:</label>
                                            <input name="email" type="text" class="form-control" id="recipient-email">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Senha Antiga:</label>
                                            <input name="senha" type="password" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Senha Nova:</label>
                                            <input name="senhaN" type="password" class="form-control" >
                                        </div>

                                        <input name="id_usuario" type="hidden" id="id_usuario">
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
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-left hidden-xs">

        </div>
        Todos os Direitos reservados Por <strong>Copyright &copy;<script>
                document.write(new Date().getFullYear());
            </script> <a href="">SOAPRO</a></strong>.

    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

    </div>
    <!-- ./wrapper -->

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever')
            var recipientnome = button.data('whatevernome')
            var recipientusuario = button.data('whateverusuario')
            var recipientsenha = button.data('whateversenha')
            var recipientemail = button.data('whateveremail')


            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Editando : ' + recipientnome)
            modal.find('#id_usuario').val(recipient)
            modal.find('#recipient-name').val(recipientnome)
            //                         modal.find('#inst-text').val(recipientinst)
            modal.find('#recipient-usuario').val(recipientusuario)
            modal.find('#recipient-senha').val(recipientsenha)
            modal.find('#recipient-email').val(recipientemail)
        })
    </script>
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:59:26 GMT -->

</html>