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
    <title>SISTEMA DE ORIENTAÇÃO PROFISSIONAL</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
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
                        <h3 class="box-title">Afectação da Faculdade a Instituição
                    </div>
                    <div class="card-header">
                        <form method="POST" action="processa/proc_afectacao_faculdade.php">
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleimputname">Faculdade</label>
                                        <select name="id_faculdade" class="form-control" readonly>
                                            <?php
                                            $result_ies = "SELECT * FROM   faculdade ORDER BY nome";
                                            $resultado_ies = mysqli_query($conecta, $result_ies);
                                            while ($row_cat = mysqli_fetch_assoc($resultado_ies)) {
                                                if ($row_cat['id_faculdade'] == $_GET['id_faculdade']) {
                                                    echo '<option  value="' . $row_cat['id_faculdade'] . '">' . $row_cat['nome'] . '</option>';
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <label for="exampleimputname">Curso</label>
                                    <div class="form-group">


                                        <select name="id_curso[]" class="form-control select2" multiple="multiple" data-placeholder="Click para seleccionar cursos" style="width: 100%;">
                                            <?php
                                            $result_ies = "SELECT * FROM curso_faculdade as cf
                                                        join curso_superior on curso_superior.id_curso = cf.id_curso
                                                        where cf.id_faculdade = " . $_GET['id_faculdade'] . "";
                                            $resultado_ies = mysqli_query($conecta, $result_ies);
                                            while ($row_cat = mysqli_fetch_assoc($resultado_ies)) {

                                                $resultado1 = mysqli_query($conecta, "SELECT * FROM curso_faculdade WHERE id_faculdade = " . $_POST['id_faculdade'] . " AND id_curso = " . $_POST['id_curso'][$a] . "");
                                                $curso_faculdade_id = mysqli_fetch_array($resultado1);

                                                $resultado = mysqli_query($conecta, "SELECT * FROM instituto_faculdade_curso WHERE id_curso_faculdade = " . $curso_faculdade_id['id_curso_faculdade'] . " AND id_instituicao = " . $_POST['id_instituicao'] . "");
                                                $linhas = mysqli_fetch_array($resultado);
                                                $selected = '';

                                                if (count($linhas) > 0) {

                                                    $selected = 'selected';
                                                }

                                                echo '<option ' . $selected . '  value="' . $row_cat['id_curso'] . '">' . $row_cat['nome'] . '</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleimputname">Afectar a Instituição de Ensino </label>
                                            <select name="id_instituicao" class="form-control">

                                                <option> Selecione a IES a afectar</option>

                                                <?php
                                                $result_ie = "SELECT * FROM instituicao_sup ORDER BY id_instituicao";
                                                $resultado_ie = mysqli_query($conecta, $result_ie);
                                                while ($row_cat = mysqli_fetch_assoc($resultado_ie)) {
                                                    echo '<option  value="' . $row_cat['id_instituicao'] . '">' . $row_cat['nome'] . '</option>';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="box-footer left">
                                        <a href='listar_faculdade.php?&id_faculdade=<?php echo $row_cat['id_faculdade']; ?>&faculdade=<?php echo $row_cat['nome']; ?>'> <button type="submit" class="btn btn-primary">Afectar</button></a>
                                        <a href="listar_faculdade.php"><button type="button" class="btn btn-danger">Voltar</button></a>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <br>
                    <?php
                    $resultado = mysqli_query($conecta, "SELECT a.id_ver, b.id_faculdade,b.nome as faculdade, cs.nome as curso , c.id_instituicao, c.nome 
FROM instituto_faculdade_curso AS a 
join curso_faculdade as cf on cf.id_curso_faculdade = a.id_curso_faculdade
join faculdade as b on b.id_faculdade = cf.id_faculdade
join instituicao_sup as c on c.id_instituicao = a.id_instituicao
join curso_superior as cs on cs.id_curso = cf.id_curso
where b.id_faculdade =" . $_GET['id_faculdade'] . "");
                    $linhas = mysqli_num_rows($resultado);
                    ?>


                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Curso</th>
                                    <th>Faculdade</th>
                                    <th>Afectação da Faculdade a Instituição</th>
                                    <th>Accão</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $a = 1;
                                while ($linhas = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td class=''>" . $a . "</td>";
                                    echo "<td class=''>" . $linhas['curso'] . "</td>";
                                    echo "<td class=''>" . $linhas['faculdade'] . "</td>";
                                    echo "<td class=''>" . $linhas['nome'] . "</td>";
                                ?>
                                    <td class="day past agileits w3layouts calendar-day-2015-11-01">


                                        <a href='processa/proc_apagar_instituto_faculdade_curso.php?id_ver=<?php echo $linhas['id_ver']; ?>'><button title="Cancelar Afectação de Curso, Faculdade, Instituição" type='button' class='btn btn-sm btn-danger'><i class="fa fa-close"></i></button></a>
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
    </div>
    </div>
    </div>


    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })
        })
    </script>
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
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:59:12 GMT -->

</html>