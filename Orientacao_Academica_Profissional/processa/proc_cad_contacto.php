<?php
session_start();
//include_once("../seguranca.php");
include_once("../conexao.php");
$nome = $_POST["nome"];
$email = $_POST["email"];
$assunto=$_POST["assunto"];
$mensagem = $_POST["mensagem"];

$query = mysqli_query($conecta, "INSERT INTO contactos (nome, email, assunto, mensagem) VALUES ('$nome', '$email','$assunto', '$mensagem')");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
        if (mysqli_affected_rows($conecta) != 0) {

            $_SESSION['contacto']='<div class="alert alert-success txe" style="text-align: center">
    
            <strong style="text-align: center">Mensagem enviada com êxito!</strong> 
         </div>'
         ;
         echo "<script>location.replace('../contacto.php')</script>";
        } else {
            $_SESSION['contacto']='<div class="alert alert-danger" style="text-align: center">
    
            <strong style="text-align: center">Erro ao enviar a mensagem, tente novamente....!</strong> 
         </div>'
         ;
        }
        ?> 
    </body>
</html>
