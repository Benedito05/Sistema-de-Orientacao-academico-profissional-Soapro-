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
                            <img src="dist/img/usa.png" class="user-image" alt="User Image">
                            <span class="hidden-xs"> <?php echo " " . $_SESSION['AdminNome'];
                                                        ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/usa.png" class="img-circle" alt="User Image">
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
                                    <a href="perfil.php" class="btn btn-default btn-flat"> Seu Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout.php" title="Sair" class="btn btn-default btn-flat"><i class="fa fa-power-off"></i></a>
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
                    <img src="dist/img/usa.png" class="img-circle" alt="User Image">
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


                <li class="active treeview-menu">
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>SOAPRO</span>
                    </a>

                </li>
                <li class="treeview">




                </li>
                <li class="treeview">



                    <a href="#">
                        <i class="fa fa-book"></i>
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
                            <i class="fa fa-user"></i> <span>Usuario</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="cad_usuario_admin.php"><i class="fa fa-circle-o"></i>Cadastar Usuario</a></li>
                            <li><a href="listar_usuario_admin.php"><i class="fa fa-circle-o"></i> Listar Usuario</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Estudantes</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="cad_estudante.php"><i class="fa fa-circle-o"></i> Cadastrar Estudante</a></li>
                        <li><a href="listar_estudante_admin.php"><i class="fa fa-circle-o"></i>Listar Estudantes</a></li>
                        <li><a href="ver_mensagem.php"><i class="fa fa-circle-o"></i> Ver Mensagem</a></li>

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
        <!-- <section class="content-header">
        <h1>
            SOAPRO

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SOAPRO</li>
        </ol>
    </section> -->