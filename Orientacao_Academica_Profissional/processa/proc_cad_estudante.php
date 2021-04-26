<?php
session_start();
//include_once("../seguranca.php");
include_once("../conexao.php");
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$id_medio = $_POST["id_medio"];
$usuario = $_POST["usuario"];
$senha = md5($_POST["senha"]);
$query = mysqli_query($conecta, "INSERT INTO estudante (nome, telefone, id_medio, usuario, senha) VALUES ('$nome', '$telefone', '$id_medio', '$usuario', '$senha')");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
    
        <?php
        if (mysqli_affected_rows($conecta) != 0) {

            $_SESSION['cad_usuario']='<div class="alert alert-success" style="text-align: center">
    
            <strong style="text-align: center">Estudante Cadastrado com Êxito!</strong> 
         </div>';
        
         header("Location: ../login.php");
        }
        else {
            $_SESSION['cad_usuario']='<div class="alert alert-danger" style="text-align: center">
    
            <strong style="text-align: center">Não foi Possivel Cadastrar com Êxito!</strong> 
         </div>';
       
         header("Location: ../login.php");
        }
        
        ?> 
    </body>
</html>
