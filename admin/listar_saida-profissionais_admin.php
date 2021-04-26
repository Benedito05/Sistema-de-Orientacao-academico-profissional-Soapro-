<!DOCTYPE html>
<?php
session_start();
include_once("seguranca.php");
include_once("conexao.php");
//ini_set('error_reporting', 0);
//echo "Bem-Vindo estudante/a : " . $_SESSION['AdminNome'];
?>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:57:18 GMT -->
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
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="shortcut icon" href="dist/img/favicon.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <?php
    include "menu.php";
    ?>


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Saídas Profissionais do curso de <strong><?= $_GET['curso'] ?></strong></h3>
                    </div>

                    <div class="card-header">
                        <form method="POST" action="processa/proc_cad_saida.php">
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleimputname">Curso</label>
                                        <select name="id_curso" class="form-control" readonly>
                                            <?php
                                            $result_ies = "SELECT * FROM   curso_superior ORDER BY nome";
                                            $resultado_ies = mysqli_query($conecta, $result_ies);
                                            while ($row_cat = mysqli_fetch_assoc($resultado_ies)) {
                                                if ($row_cat['id_curso'] == $_GET['id_curso']) {
                                                    echo '<option selected value="' . $row_cat['id_curso'] . '">' .$row_cat['nome'] . '</option>';
                                                }
                                            }

                                            ?>

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleimputname">Nome da Saída</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="nome_saida" placeholder="Digite a  saida profissional">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="box-footer left">
                                    <a href='listar_saida-profissionais_admin.php?&id_curso=<?php echo $row_cat['id_curso']; ?>&curso=<?php echo $row_cat['curso']; ?>'> <button type="submit" class="btn btn-primary">Cadastrar</button></a>
                                    <a href="listar_curso_superior_admin.php"> <button type="button" class="btn btn-danger">Voltar</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <?php
                    $resultado = mysqli_query($conecta, "select id_saida, nome As nome_curso, nome_saida  from curso_superior AS cs INNER JOIN  saida_profissional AS sp ON cs.id_curso=sp.id_curso WHERE  sp.id_curso = " . $_GET['id_curso'] . "");
                    $linhas = mysqli_num_rows($resultado);
                    ?>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Saídas Profissionais</th>
                                    <th>Accão</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $a = 1;
                                while ($linhas = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td class=''>" . $a . "</td>";
                                    echo "<td class=''>" .  $linhas['nome_saida'] . "</td>";
                                ?>
                                    <td class="day past agileits w3layouts calendar-day-2015-11-01">

                                        <a href='#?&id_saida=<?php echo $linhas['id_saida']; ?>'><button type='button' class="btn btn-warning" title="Editar Saída" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $linhas['id_saida']; ?>" data-whatevernome="<?php echo $linhas['nome_saida']; ?>"><i class="fa fa-edit"></i></button></a>
                                        <a href='processa/proc_apagar_saida.php?id_saida=<?php echo $linhas['id_saida']; ?>'><button type='button' class='btn  btn-danger'><i class="fa fa-trash"></i></button></a>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Saída</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="processa/proc_edit_saida.php">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Saída Profissional:</label>
                                <input name="nome_saida" type="text" class="form-control" id="recipient-name">
                            </div>

                            <input name="id_saida" type="hidden" id="id_saida">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
       
        

    </section>
   


  



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

<script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever')
            var recipientnome = button.data('whatevernome')
          
            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Editar Saída de ' + recipientnome)
            modal.find('#id_saida').val(recipient)
            modal.find('#recipient-name').val(recipientnome)
           
           
        })
       
       
     
    </script>
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:59:12 GMT -->

</html>