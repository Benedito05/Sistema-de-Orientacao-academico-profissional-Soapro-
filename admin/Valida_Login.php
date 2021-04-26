
<?php
session_start();
ob_start();
include_once("conexao.php");
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$result = mysqli_query($conecta, "SELECT * FROM usuarios WHERE usuario='$usuario'  AND senha='$senha'   LIMIT 1");
$resultado = mysqli_fetch_assoc($result);
//echo "Admin: " . $resultado['nome'];
if (empty($resultado)) {
    
    

    $_SESSION['login_erro']='<div class="alert alert-danger" style="text-align: center">
    
    <strong style="text-align: center">Verifique seu nome de acesso ou senha!</strong> 
 </div>'
 ;
    
    header("Refresh:0, login.php");
} else {
    
  
    //Define os valores atribuidos na sessao do usuario
    $_SESSION['AdminId'] = $resultado['id_usuario'];
    $_SESSION['AdminNome'] = $resultado['nome'];
    $_SESSION['AdminUsuario'] = $resultado['usuario'];
    $_SESSION['AdminSenha'] = $resultado['senha'];
    $_SESSION['AdminEmail'] = $resultado['email'];
    $_SESSION['AdminNivel_Acesso'] = $resultado['Nivel_Acesso'];


    $_SESSION['login_suc']='<div class="alert alert-success" style="text-align: center">
    
    <strong style="text-align: center">Logado com êxito! Redireccionando ao sistema...</strong> 
 </div>'
 ;
    header("Refresh:0, login.php");


}
?>