<?php
session_start();
require_once("seguranca.php");
include_once("conexao.php");

//echo "Bem-Vindo Administrador/a : " . $_SESSION['AdminNome'];
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/forms/general.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2019 13:58:55 GMT -->
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
    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="chosen/bootstrap-chosen.css">
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
                        <h3 class="box-title">Cadastro de Estudantes</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    if (isset($_SESSION['cad_usuario'])) {
                        echo $_SESSION['cad_usuario'];
                        unset($_SESSION['cad_usuario']);
                        header("Refresh:2.1, listar_estudante_admin.php");
                    }
                    ?>
                   
                    
                    <form role="form" method="POST" action="processa/proc_cad_estudante.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleimputname">Nome</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nome" required="required" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label for="exampleimputname">Telefone</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="telefone" placeholder="Número de Telefone">
                            </div>
                            <div class="form-group">
                                <label for="exampleimputname">Curso Médio</label>
                                <select style="width: 100%" class=" chosen-select" id="country" required="required" name="id_medio">
                                    <option>Selecione seu Curso Médio </option>

                                    <?php
                                    $result_medio = "SELECT * FROM curso_medio ORDER BY id_medio";
                                    $resultado_medio = mysqli_query($conecta, $result_medio);
                                    while ($row_cat = mysqli_fetch_assoc($resultado_medio)) {
                                        echo '<option value="' . $row_cat['id_medio'] . '">' . $row_cat['nome'] . '</option>';
                                    }
                                    ?>


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleimputname">Usuario</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="usuario" required="required" placeholder="Nome do Usuario">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="senha" required="required" placeholder=" Password">
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <a href="listar_estudante_admin.php"><button type="button" class="btn btn-danger">Voltar</button></a> </div>

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
            Todos os Direitos reservados Por <strong>Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> <a href="">SOAPRO</a></strong>.

        </footer>
        </div>
        <script src="dist/js/jquery-3.2.1.min.js"></script>
        <script src="chosen/chosen.jquery.js"></script>
        <script>
            $('.chosen-select').chosen({
                width: '100%',
                placeholder_text: "Selecione uma opção...",
                no_results_text: "Oops, valor não encontrado!"
            });
        </script>
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