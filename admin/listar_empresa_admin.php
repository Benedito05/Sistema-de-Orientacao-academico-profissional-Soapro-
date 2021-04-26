<!DOCTYPE html>
<?php
session_start();
//include_once("seguranca.php");
include_once("conexao.php");
//ini_set('error_reporting', 0);
//echo "Bem-Vindo Administrador/a : " . $_SESSION['AdminNome'];
?>
<html>

    <!-- Mirrored from adminlte.io/themes/AdminLTE/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:57:18 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="index.php" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>SOAPRO</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b> SOAPRO</b></span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">  <p>
                                            <?php echo " " . $_SESSION['AdminNome'];
                                            ?> 
                                        </p></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                         <p>
                                            <?php echo " " . $_SESSION['AdminNome'];
                                            ?> 
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">

                                        <div class="pull-right">
                                            <a href="login.php" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->

                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="dist/img/ivan-perfil-sem-foto.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p> <?php echo " " . $_SESSION['AdminNome'];
                                ?>  
</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->

                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                  <ul class="sidebar-menu" data-widget="tree">
                      
                      
                        <li class="header">Menú Principal</li>
                        <li class="active treeview-menu">
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>SOAPRO</span>
                            </a>

                        </li>
     
                        <li class="treeview">
                            
                          
                            
                            <a href="#">
                                <i class="fa fa-universal-access"></i>
                                <span> Ensino Medio</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="cad_curso_medio_admin.php"> Cadastrar Cursos</a></li>
                                <li><a href="listar_curso_medio_admin.php"> Listar Cursos</a></li>
                                  

                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-university"></i>
                                <span> Ensino Superior</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="cad_curso_superior_admin.php"> Cadastrar Cursos</a></li>
                                <li><a href="listar_curso_superior_admin.php">Listar Cursos</a></li>
                                <li><a href="cad_ies__admin.php"> Cadastrar IES</a></li>
                                <li><a href="listar_ies_admin.php"> Listar IES</a></li>
                                 <li><a href="listar_saida-profissionais_admin.php"> Saidas Profissionais</a></li>
                                  

                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Empresa</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="cad_empresa_admin.php"> Cadastrar Empresa</a></li>
                                <li><a href="listar_empresa_admin.php"> Listar Empresa</a></li>
                                

                            </ul>
                        </li>
                       


                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user-circle"></i> <span>Usuario</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="cad_usuario_admin.php"><i class="fa fa-circle-o"></i>Cadastar Usuario</a></li>
                                <li><a href="listar_usuario_admin.php"><i class="fa fa-circle-o"></i> Listar Usuario</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Estudantes</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="listar_estudante_admin.php"><i class="fa fa-circle-o"></i>Listar Estudantes</a></li>


                            </ul>
                        </li>
                        <li>
                            <a href="ver_denuncia.php">
                                <i class="fa fa-file-archive-o"></i> <span>Ver Denuncias</span>
                                <span class="pull-right-container">

                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="calendario.php">
                                <i class="fa fa-calendar"></i> <span>Calendario</span>
                                <span class="pull-right-container">

                                </span>
                            </a>
                        </li>



                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        SOAPRO
                        <small>Version 2.0</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">SOAPRO</li>
                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- /.box -->

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Listar Empresas</h3>
                                </div>
                                <div class="card-footer">
                                    <a href="cad_empresa_admin.php"><button type='button' class='btn btn-sm btn-primary'>Cadastrar</button></a>
                                </div>
                                <?php
                                $resultado = mysqli_query($conecta, "select * from empresas order by 'id_usuario'");
                                $linhas = mysqli_num_rows($resultado);
                                ?>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nome</th>
                                                <th>Area</th>
                                                <th>Sector</th>
                                                <th>Acções</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($linhas = mysqli_fetch_array($resultado)) {
                                            echo "<tr>";
                                            echo "<td class=''>" . $linhas['id_empresa'] . "</td>";
                                            echo "<td class=''>" . $linhas['nome'] . "</td>";
                                            echo "<td class=''>" . $linhas['area'] . "</td>";
                                            echo "<td class=''>" . $linhas['sector'] . "</td>";
                                            ?>
                                        <td class="day past agileits w3layouts calendar-day-2015-11-01"> 


                                            <a  href='administrativo.php?link=5&id_empresa=<?php echo $linhas['id_empresa']; ?>'><button  type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>

                                            <a href='editar_empresa.php?link=4&id_empresa=<?php echo $linhas['id_empresa']; ?>'><button  type='button' class='btn btn-sm btn-warning'>Editar</button></a>
                                            <a href='processa/proc_apagar_empresa.php?id_empresa=<?php echo $linhas['id_empresa']; ?>'><button  type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
                                            <?php
                                            echo "</tr>";
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
    </body>

    <!-- Mirrored from adminlte.io/themes/AdminLTE/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:59:12 GMT -->
</html>
