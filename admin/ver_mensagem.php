 <?php
    session_start();
    include_once 'conexao.php';
    ?>
 <!DOCTYPE html>
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

     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-xs-12">
                 <?php
                    if (isset($_SESSION['apagar_contacto'])) {

                        echo $_SESSION['apagar_contacto'];
                        unset($_SESSION['apagar_contacto']);
                        //  header("Refresh:2.1, ver_denuncia.php");
                    }

                    ?>

                 <div class="box">
                     <div class="card-footer">
                         <a href="index.php"><button type='button' class='btn btn-sm btn-danger'>Voltar</button></a>
                     </div>

                     <div class="box-header">
                         <h3 class="box-title">Listar Contactos</h3>
                     </div>

                     <?php
                        $resultado = mysqli_query($conecta, "select * from contactos order by 'id_contacto'");
                        $linhas = mysqli_num_rows($resultado);
                        ?>
                     <!-- /.box-header -->

                     <div class="box-body">
                         <table id="example1" class="table table-bordered table-striped">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Nome</th>
                                     <th>Mensagem</th>
                                     <th>Email</th>
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
                                        echo "<td class=''>" . $linhas['mensagem'] . "</td>";
                                        echo "<td class=''>" . $linhas['email'] . "</td>";
                                    ?>
                                     <td class="day past agileits w3layouts calendar-day-2015-11-01">


                                         <a href='https://mail.google.com/mail/u/0/#inbox?id_contacto=<?php echo $linhas['id_contacto']; ?>'><button type='button' tareget_blank class='btn  btn-primary' title="Responder mensagem"><i class="fa fa-envelope"></i></button></a>
                                         <a href='processa/proc_apagar_contacto.php?id_contacto=<?php echo $linhas['id_contacto']; ?>'><button type='button' class='btn  btn-danger' title="Apagar mensagem"><i class="fa fa-trash"></i></button></a>

                                     <?php
                                        echo "</tr>";
                                        $a++;
                                    }
                                        ?>
                             </tbody>

                         </table>
                     </div>
                 </div>
                 <!-- /.box-body -->
             </div>
         </div>
     </section>

     </div>
     <!-- /. box -->
     <footer class="main-footer">
         <div class="pull-left hidden-xs">

         </div>
         Todos os Direitos reservados Por <strong>Copyright &copy;<script>
                 document.write(new Date().getFullYear());
             </script> <a href="">SOAPRO</a></strong>.

     </footer>
     <!-- /.box -->
     </div>
     <!-- /.col -->

     <!-- /.col -->
     </div>
     <!-- /.row -->
     </section>
     <!-- /.content -->
     </div>




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
 </body>

 <!-- Mirrored from adminlte.io/themes/AdminLTE/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:58:15 GMT -->

 </html>