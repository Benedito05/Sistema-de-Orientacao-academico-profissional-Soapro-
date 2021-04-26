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
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">

   
<?php
    include "menu.php";
?>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">

                        <div class="small-box bg-green">
                            <div class="inner">
                                <?php
                                $resultado = mysqli_query($conecta, "select * from curso_superior order by 'id_curso'");
                                $linhas = mysqli_num_rows($resultado);
                                ?>
                                <h3><?php echo $linhas ?><sup style="font-size: 20px"></sup></h3>

                                <p>Total de Cursos Superior</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                        </div>

                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <?php if ($_SESSION['AdminNivel_Acesso'] == "Administrador") { ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <?php
                                $resultado1 = mysqli_query($conecta, "select * from usuarios order by 'id_usuario'");
                                $linhas1 = mysqli_num_rows($resultado1);
                                ?>
                                <h3><?php echo $linhas1 ?></h3>

                                <p>Total de Usuários</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <?php } ?>
                    <!-- /.col -->

                    <!-- fix for small devices only -->


                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="small-box bg-light-blue">
                            <div class="inner">
                                <?php
                                $resultado2 = mysqli_query($conecta, "select * from instituicao_sup order by 'id_instituicao'");
                                $linhas2 = mysqli_num_rows($resultado2);
                                ?>
                                <h3><?php echo $linhas2 ?></h3>

                                <p>Total de Instituições Superiores</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-university"></i>
                            </div>
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <?php
                                $resultado3 = mysqli_query($conecta, "select * from estudante order by 'id_estudante'");
                                $linhas3 = mysqli_num_rows($resultado3);
                                ?>
                                <h3><?php echo $linhas3 ?></h3>

                                <p>Total de Estudantes</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker"></i>
                            </div>
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <table class="columns">
                        <tr>
                            <td>
                                <div id="piechart_div" style="border: 1px solid #ccc"></div>
                            </td>
                            <td>
                                <div id="lineChart_div" style="border: 1px solid #ccc"></div>


                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.row -->


                <!-- /.row -->

                <!-- Main row -->

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

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap  -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>


    <script>
        $(function() {
            "use strict";

            // AREA CHART
            var area = new Morris.Area({
                element: 'revenue-chart',
                resize: true,
                data: [{
                        y: '2011 Q1',
                        item1: 2666,
                        item2: 2666
                    },
                    {
                        y: '2011 Q2',
                        item1: 2778,
                        item2: 2294
                    },
                    {
                        y: '2011 Q3',
                        item1: 4912,
                        item2: 1969
                    },
                    {
                        y: '2011 Q4',
                        item1: 3767,
                        item2: 3597
                    },
                    {
                        y: '2012 Q1',
                        item1: 6810,
                        item2: 1914
                    },
                    {
                        y: '2012 Q2',
                        item1: 5670,
                        item2: 4293
                    },
                    {
                        y: '2012 Q3',
                        item1: 4820,
                        item2: 3795
                    },
                    {
                        y: '2012 Q4',
                        item1: 15073,
                        item2: 5967
                    },
                    {
                        y: '2013 Q1',
                        item1: 10687,
                        item2: 4460
                    },
                    {
                        y: '2013 Q2',
                        item1: 8432,
                        item2: 5713
                    }
                ],
                xkey: 'y',
                ykeys: ['item1', 'item2'],
                labels: ['Item 1', 'Item 2'],
                lineColors: ['#a0d0e0', '#3c8dbc'],
                hideHover: 'auto'
            });

            // LINE CHART
            var line = new Morris.Line({
                element: 'line-chart',
                resize: true,
                data: [{
                        y: '2011 Q1',
                        item1: 2666
                    },
                    {
                        y: '2011 Q2',
                        item1: 2778
                    },
                    {
                        y: '2011 Q3',
                        item1: 4912
                    },
                    {
                        y: '2011 Q4',
                        item1: 3767
                    },
                    {
                        y: '2012 Q1',
                        item1: 6810
                    },
                    {
                        y: '2012 Q2',
                        item1: 5670
                    },
                    {
                        y: '2012 Q3',
                        item1: 4820
                    },
                    {
                        y: '2012 Q4',
                        item1: 15073
                    },
                    {
                        y: '2013 Q1',
                        item1: 10687
                    },
                    {
                        y: '2013 Q2',
                        item1: 8432
                    }
                ],
                xkey: 'y',
                ykeys: ['item1'],
                labels: ['Item 1'],
                lineColors: ['#3c8dbc'],
                hideHover: 'auto'
            });

            //DONUT CHART
            var donut = new Morris.Donut({
                element: 'sales-chart',
                resize: true,
                colors: ["#3c8dbc", "#f56954", "#00a65a"],
                data: [{
                        label: "Download Sales",
                        value: 12
                    },
                    {
                        label: "In-Store Sales",
                        value: 30
                    },
                    {
                        label: "Mail-Order Sales",
                        value: 20
                    }
                ],
                hideHover: 'auto'
            });
            //BAR CHART
            var bar = new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                data: [{
                        y: '2006',
                        a: 100,
                        b: 90
                    },
                    {
                        y: '2007',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2008',
                        a: 50,
                        b: 40
                    },
                    {
                        y: '2009',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2010',
                        a: 50,
                        b: 40
                    },
                    {
                        y: '2011',
                        a: 75,
                        b: 65
                    },
                    {
                        y: '2012',
                        a: 100,
                        b: 90
                    }
                ],
                barColors: ['#00a65a', '#f56954'],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['CPU', 'DISK'],
                hideHover: 'auto'
            });
        });
    </script>
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:58:15 GMT -->

</html>