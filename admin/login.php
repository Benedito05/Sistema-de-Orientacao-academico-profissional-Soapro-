<?php
include 'functions.php';
$help = new Help_Function();
session_start();



if ($help->verificarUsuarios() == 'no_user')
    echo '<script>location.replace("registar.php");</script>';
?>
<!DOCTYPE html>
<html>
<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:59:26 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SOAPRO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-csale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="shortcut icon" href="dist/img/favicon.png">

    <script src="dist/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
</head>

<body class="hold-transition login-page">
    <?php
    if (!empty($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        session_destroy();
    }
    ?>
    <br>  <br>  <br>  <br>
   
    <div class="login-box" >
        <div class="login-logo">
            
            <div class="logo_text" style="font-family: 'Roboto Slab', serif;font-weight: 700px; "><b style="color: #14BDEE; font: 36px">SOA</b><b style="color: #14BDEE;font-family: 'Roboto Slab', serif; font: 38px">PRO</b></div>
        </div>
        <!-- /.login-logo -->
        
        <div class="login-box-body ">
            <p class="login-box-msg">INICIAR SESSÃO</p>

            <p class="text-danger text-center" >

                <?php
                if (isset($_SESSION['login_erro'])) {
                    echo $_SESSION['login_erro'];
                    unset($_SESSION['login_erro']);
                }
                ?>
            </p>
            <?php
            if (isset($_SESSION['login_suc'])) {
                echo $_SESSION['login_suc'];
                unset($_SESSION['login_suc']);
                header("refresh: 2.1, index.php");
            }
            ?>
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            ?>
            <form method="POST" action="Valida_Login.php">
                
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="usuario" placeholder="Nome de Usuario" required="">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="senha" placeholder="Password" required="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <input hidden="Nivel_Acesso" name="Nivel_Acesso">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12 ">
                        <button type="submit" class="btn btn-primary btn-block ">Entrar</button>
                    </div>


                    <!-- /.col -->

                    <!--                        <div class="overlay">
                            <i class="fa-fa-refresh   fa-spin"></i>
                        </div>-->
                </div>
            </form>



            <!-- /.social-auth-links -->




        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>

</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:59:28 GMT -->

</html>