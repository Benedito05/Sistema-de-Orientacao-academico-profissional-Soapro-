<?php

session_start();
include_once("conexao.php");
$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$result = mysqli_query($conecta, "SELECT * FROM estudante WHERE usuario='$usuario'  AND senha='$senha'   LIMIT 100");
$resultado = mysqli_fetch_assoc($result);
//echo "Estudante: " . $resultado['nome'];
if (!($resultado)) {
    //Mensagem de Erro


    //Manda o usuario para a tela echo "
    $_SESSION['login_erro'] = '<div class="alert alert-danger">
    
    <strong>Verifique seu nome de acesso ou senha!</strong> 
 </div>';


    header("Refresh:0, login.php");
} else {

    //Define 
    // os valores atribuidos na sessao do usuario
    $_SESSION['EstudanteId_estudante'] = $resultado['id_estudante'];
    $_SESSION['EstudanteNome'] = $resultado['nome'];
    $_SESSION['EstudanteTelefone'] = $resultado['telefone'];
    $_SESSION['EstudanteId_medio'] = $resultado['id_medio'];
    $_SESSION['EstudanteUsuario'] = $resultado['usuario'];
    $_SESSION['EstudanteSenha'] = $resultado['senha'];

    if ($_SESSION['EstudanteSenha'] == "$senha") {


        $_SESSION['login1'] = '<div class="alert alert-success" style="text-align: center">
    
        <strong style="text-align: center">Logado com êxito! Redireccionando a sua conta...</strong> 
     </div>';



        echo "<script>location.replace('login.php')</script>";
    }
}
