
<?php
   
  session_start();
 
   if (isset($_SESSION['usuariomk']) && (isset($_SESSION['senhamk']))) {
    header("Location: Admin2/index.php"); exit;
   }
  include("../Conexao/conexao.php");
   $connexao=connexao();  
 ?>

<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from colorlib.com/polygon/gentelella/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Jun 2018 10:38:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | </title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../Admin2/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../Admin2/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../Admin2/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../Admin2/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">

<style type="text/css">



body{background: url(imagem2/foto.jpg) ; 
}

</style>


     <?php
  if (isset($_GET['acao'])) {
    if (!isset($_POST['logar'])) {
      
    
    $acao = $_GET['acao'];
    if ($acao=='negado') {
      echo '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Erro ao Acessar!</strong> voce precisa estar loago pra acessar o sistema.
                         </div>';
    }
    }
  }

  if (isset($_POST['logar'])) {
    //Recuperar Dados
    $usuario = trim(strip_tags($_POST['usuario']));
    $senha = trim(strip_tags($_POST['senha']));

    //Selecionar BD
    $select = "SELECT * from acesso WHERE BINARY usuario = :usuario AND BINARY senha=:senha";
    try {
        $result = $connexao->prepare($select);
        $result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $result->bindParam(':senha', $senha, PDO::PARAM_STR);
        $result->execute();
        $contar = $result->rowCount();
        if ($contar>0) {
          $usuario = $_POST['usuario'];
          $senha = $_POST['senha'];
          $_SESSION['usuariomk'] = $usuario;
          $_SESSION['senhamk'] = $senha;
          $_SESSION['logado']=true;
          echo '<div class="alert alert-success">
                            <button type="button" data-dismiss="alert">×</button>
                            <strong>Logado com Sucesso!</strong> Redirecionando para o Sistema.
                         </div>';
          header("Refresh: 1, Admin2/index.php");
        }
        else{
          echo '<div class="alert">
                            <button type="button" data-dismiss="alert">×</button>
                            <strong> Erro ao Logar! </strong> Verifique as suas credenciais.
                         </div>';

        }
      
    } catch (PDOException $e) {
      echo "$e";
    }
  }
?>



    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
           <form class="login"action="#" method="POST" >
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Usuario" name="usuario" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Senha  " name="senha" required="" />
              </div>
              <div>
                    <button type="submit" name="logar">Entrar
                 
              </div>

<img src="imagem2/cc.png">

              <div class="clearfix"></div>

              <div class="separator">
                  </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i>MINCOP Eventos</h1>
                  <p>Copyright © 2018 Todos os direitos reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
  </body>

<!-- Mirrored from colorlib.com/polygon/gentelella/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Jun 2018 10:38:01 GMT -->
</html>
