<?php
session_start();
require_once("seguranca.php");
include_once("conexao.php");

//echo "Bem-Vindo Administrador/a : " . $_SESSION['AdminNome'];
?>
<html>
    <head>
        <!-- Mirrored from adminlte.io/themes/AdminLTE/pages/forms/general.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:58:55 GMT -->
        <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

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
        <div class="wrapper">
            <?php
            $id_curso = filter_input(INPUT_GET, 'id_curso', FILTER_SANITIZE_NUMBER_INT);
            $result = mysqli_query($conecta, "SELECT * from curso_superior");
            $resultado = mysqli_fetch_assoc($result);
            ?>

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
                                    <span class="hidden-xs"><p>
                                            <?php echo " " . $_SESSION['AdminNome'];
                                            ?> 
                                        </p></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                           <p>
                                            <?php echo " " . $_SESSION['AdminNome'];
                                            ?> 
                                        </p>

                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="login.php" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->

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
                                <li><a href="cad_faculdade_admin.php"> Cadastrar Faculdades</a></li>
                                <li><a href="listar_faculdade.php"> Listar faculdades</a></li>
                              


                            </ul>
                        </li>

                        <?php if ($_SESSION['AdminNivel_Acesso'] == "Administrador") { ?>
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
                                    <li><a href="ver_denuncia.php"><i class="fa fa-circle-o"></i> Ver Contactos</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Estudantes</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="listar_estudante_admin.php"><i class="fa fa-circle-o"></i>Listar Estudantes</a></li>
                                <li><a href="ver_denuncia.php"><i class="fa fa-circle-o"></i> Ver Contactos</a></li>

                            </ul>
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


                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Editar  Curso Superior</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="POST" action="processa/proc_edit_sup.php">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleimputname">Nome</label>
                                            <input type="text" class="form-control"   name="nome" placeholder="Digite o  nome do curso " value="<?php echo $resultado['nome']; ?>">
                                        </div>
<!--                                        <div class="form-group">
                                            <label for="exampleimputname">Faculdade</label>
                                                            <select name="nome_fau" style="width: 100%; height: 5%">

                                                <option>Selecione Uma Faculdade </option>

                                                <?php
                                                $result_ies = "SELECT * FROM  faculdade ORDER BY nome";
                                                $resultado_ies = mysqli_query($conecta, $result_ies);
                                                while ($row_cat = mysqli_fetch_assoc($resultado_ies)) {
                                                  
                                                    echo '<option  value="' . $row_cat['id_faculdade'] . '">' . $row_cat['nome'] . '</option>';
                                                }
                                                ?>

                                            </select><br><br>
                                        </div>-->
                                        

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Ano Duracao</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="ano_duracao" placeholder=" Digite o ano de duracao" value="<?php echo $resultado['ano_duracao']; ?>">
                                        </div>



                                        <div class="form-group">

                                            <input type="hidden"  name="id_curso"  value="<?php echo $resultado['id_curso']; ?>"  >
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" name="" class="btn btn-primary">Editar Curso</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->


            </div>

        </section>
        <!-- /.box -->

        <!-- Form Element sizes -->

        <!-- /.box -->

    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<!-- Input addon -->

<!-- /.box -->  

</div>
<!--/.col (left) -->
<!-- right column -->

<!--/.col (right) -->
</div>
<!-- /.row -->

<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy;2019 <a href="">SOAPRO</a>.</strong> Todos os Direitos reservados.

</footer>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/forms/general.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:58:55 GMT -->
</html>
