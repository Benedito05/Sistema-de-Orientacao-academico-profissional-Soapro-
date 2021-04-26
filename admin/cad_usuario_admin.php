<?php
session_start();
require_once("seguranca.php");
include_once("conexao.php");

//echo "Bem-Vindo Administrador/a : " . $_SESSION['AdminNome'];
?>
<!DOCTYPE html>
<html>

    <!-- Mirrored from adminlte.io/themes/AdminLTE/pages/forms/general.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:58:55 GMT -->
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
    <?php include "menu.php" ?>
   
    
                <section class="content">
                    <div class="row">
              
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
<!--                         
                        <?php
                if (isset($_SESSION['login_erro'])) {
                    echo $_SESSION['login_erro'];
                    unset($_SESSION['login_erro']);
                }
                ?> -->

            
                                <div class="box-header with-border">
                                    <h3 class="box-title">Cadastro de Usuario</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="POST" action="processa/proc_cad_usuario.php">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleimputname">Nome</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="nome" placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleimputname">Usuario</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="usuario" placeholder="Nome do Usuario">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="senha"placeholder=" Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"  name="email" placeholder=" Email">
                                        </div>




                                        <div class="form-group">
                                            <select class="form-control select2-dropdown" name="Nivel_Acesso" >

                                                <option> Niveis de Acesso</option>
                                                <option> Administrador</option>
                                                <option>Gestor_Academico</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                      <a href="listar_usuario_admin.php"><button type="button" class="btn btn-danger">Voltar</button></a>                                    </div>

                                </form>
                            </div>


                        </div>
                        <!-- /.box-body -->


                    </div>


                    <!-- /.box -->

                    <!-- Form Element sizes -->

                    <!-- /.box -->


                    <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- Input addon -->

            <!-- /.box -->  
 <footer class="main-footer">
                <div class="pull-left hidden-xs">
                    
                </div>
                 Todos os Direitos reservados Por <strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="">SOAPRO</a></strong>.

            </footer>
        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
  
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

