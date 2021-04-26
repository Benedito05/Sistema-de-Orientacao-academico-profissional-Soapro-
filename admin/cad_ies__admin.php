<?php
session_start();
require_once("seguranca.php");
include_once("conexao.php");
$connexao = connexao();

//echo "Bem-Vindo Administrador/a : " . $_SESSION['AdminNome'];
#INSERT DOCUMENTOS NO SISTEMA.
if (isset($_POST['btnGuardar'])) {

    $nome = $_POST['nome'];
    $sector = $_POST['sector'];
    $localizacao = $_POST['localizacao'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $id_tipo = $_POST['id_tipo'];

    $file = $_FILES['img'];
    $numFile = count(array_filter($file['name']));

    //Pasta
    $folder = 'dist/img/uni_foto/';

    //Requisitos
    $permite = array('image/jpeg', 'image/png');
    $maxSize = 4000 * 4000 * 20;

    //Mensagens
    $msg = array();
    $errorMsg = array(
        1 => 'O Arquivo no Upload é maior do que o limite definido em upload_max_filesize no php.ini.',
        2 => 'O Arquivo Ultrapassa o limite de tamanho em max_filesize que foi especificado no formulario HTML',
        3 => 'O Upload do arquivo foi feito parcialmente',
        4 => 'Não foi feito o upload do arquivo');

    if ($numFile <= 0) {

          $_SESSION['cad_ies1']='<div class="alert alert-Warning" style="text-align: center">
    
        <strong style="text-align: center">Erro! preencha os campos...</strong> 
     </div>';
    //  header("location: cad_ies__admin.php");
    } else if ($numFile >= 2) {

        echo '<script>alert("Erro!Voce ultrapassou o limite de upload. Selecione apenas uma e tente novamente");</script>';
    } else {

        for ($i = 0; $i < $numFile; $i++) {

            $name = $file['name'][$i];
            $type = $file['type'][$i];
            $size = $file['size'][$i];
            $error = $file['error'][$i];
            $tmp = $file['tmp_name'][$i];
            $extensao = @end(explode('.', $name));
            $novoNome = rand() . ".$extensao";

            if ($error != 0)
                $msg[] = "<b>$name :</b>" . $errorMsg[$error];

            else if (!in_array($type, $permite))
                $msg[] = "<script>alert('Erro!Imagen não suportada.');</script>";

            else if ($size > $maxSize)
                $msg[] = "<script>alert('Erro! Taamanho da imagen muito grande.');</script>";

            else {

                if (move_uploaded_file($tmp, $folder . '/' . $novoNome)) {

                    //$msg[] = "<b>$name : </b> Upload Realizado com Sucesso";

                    $sql = 'INSERT INTO instituicao_sup (nome, sector, localizacao,email,telefone,id_tipo, foto)';
                    $sql.= 'VALUES (:nome, :sector,:localizacao,:email,:telefone,:id_tipo, :foto)';
                    try {
                        $create = $connexao->prepare($sql);
                        $create->bindValue(':nome', $nome, PDO::PARAM_STR);
                        $create->bindValue(':sector', $sector, PDO::PARAM_STR);
                        $create->bindValue(':localizacao', $localizacao, PDO::PARAM_STR);
                        $create->bindValue(':email', $email, PDO::PARAM_STR);
                        $create->bindValue(':telefone', $telefone, PDO::PARAM_STR);
                        $create->bindValue(':id_tipo', $id_tipo, PDO::PARAM_STR);
                        $create->bindValue(':foto', $novoNome, PDO::PARAM_STR);



                        if ($create->execute()) { 
                            $_SESSION['cad_ies']='<div class="alert alert-success" style="text-align: center">
    
                            <strong style="text-align: center"> Instituto ou Universidade Cadastrada com Sucesso!</strong> 
                         </div>';
                         header("Location: listar_ies_admin.php");
                        } else {
                            $_SESSION['cad_ies']='<div class="alert alert-danger" style="text-align: center">
    
                            <strong style="text-align: center">Erro ao  Cadastrar, tente novamente!</strong> 
                         </div>';
                         header("Location: ../cad_ies_admin.php");
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                } else
                    $msg[] = "<b>$name : </b> Desculpe! Ocorreu um erro...";
            }
            foreach ($msg as $pop)
                echo $pop . '<br>';
        }
    }
}
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
                            <?php
                if (isset($_SESSION['cad_ies1'])) {

                    echo $_SESSION['cad_ies1'];
                    unset($_SESSION['cad_ies1']);
                    header("refresh:2.1, cad_ies__admin.php");
                }

                ?>
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Cadastro de Universidades e Institutos</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="POST" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleimputname">Nome da Universidade</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="nome" placeholder="Digite  o nome da Universidade">

                                        </div>
                                        <div class="form-group">
                                            <label>Sector da Universidade/Instituto</label>
                                            <select class="form-control select2-dropdown " name="sector">
                                                <option> Selecione o Sector da Universidade</option>
                                                <option> Privada</option>
                                                <option> Publica</option>
                                            </select>


                                        </div>
                                        <div class="form-group">
                                            <label for="exampleimputname">Localização</label>
                                            <input type="text" class="form-control" id="exempleinputarea"  name="localizacao" placeholder="Digite a localização">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleimputname">Email</label>
                                            <input type="email" class="form-control" id="exempleinputarea" name="email" placeholder="exemplo@hotmail.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleimputname">Telefone</label>
                                            <input type="text" class="form-control" id="exempleinputarea"  name="telefone" placeholder="Digite o numero de telefone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleimputname">Tipo</label>

                                            <select class="form-control select2-dropdown " name="id_tipo">
                                                <option> Selecione o Tipo</option>

                                                <?php
                                                $resultado = mysqli_query($conecta, "SELECT * FROM tipo_ies");
                                                $linhas = mysqli_num_rows($resultado);

                                                while ($row_cat = mysqli_fetch_assoc($resultado)) {
                                                    echo '<option value="' . $row_cat['id_tipo'] . '">' . $row_cat['nome'] . '</option>';
                                                }
                                                ?> 
                                            </select>


                                        </div>

                                        <div class="form-group">
                                            <label for="exampleimputname">Foto</label>
                                            <input type="file" class="form-control"   name="img[]">
                                        </div>

                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" name="btnGuardar" class="btn btn-primary">Cadastrar</button>
                                        <a href="listar_ies_admin.php"><button type='button' class='btn btn-danger'>Voltar</button></a>

                                    </div>
                                    
                                </form>
                                
                                





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
                </section>
            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
             <footer class="main-footer">
                <div class="pull-left hidden-xs">
                    
                </div>
                 Todos os Direitos reservados Por <strong>Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="">SOAPRO</a></strong>.

            </footer>
        </div>
        <!-- /.row -->

        <!-- /.content -->

        
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
