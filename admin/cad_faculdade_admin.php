<?php
session_start();
require_once 'seguranca.php';
include_once 'conexao.php';
?>
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
    <?php
    include "menu.php";
    ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Cadastro de Faculdade</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form  method="POST" action="processa/proc_cad_fau.php">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleimputname">Nome</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"  name="nome" placeholder="Digite o  nome da Faculdade ">
                                        </div>
<!--                                        <div class="form-group">
                                            <label for="exampleimputname">Universidade ou Instituto</label>
                                            <select name="id_instituicao" style="width: 100%; height: 5%">

                                                <option>Selecione Uma IES </option>

                                                <?php
                                                $result_ies = "SELECT * FROM instituicao_sup ORDER BY nome";
                                                $resultado_ies = mysqli_query($conecta, $result_ies);
                                                while ($row_cat = mysqli_fetch_assoc($resultado_ies)) {
                                                    echo '<option value="' . $row_cat['id_instituicao'] . '">' . $row_cat['nome'] . '</option>';
                                                }
                                                ?>

                                            </select><br><br>
                                        </div>-->
                                       
                                     
                                      
                                               
                                       
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                        <a href="listar_faculdade.php"><button type="button" class="btn btn-danger">Voltar</button></a>
                                    </div>
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
    </div>
    <!-- /.row -->


<!-- /.content-wrapper -->

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