<?php
session_start();
//include_once("../seguranca.php");
include_once("../conexao.php");
$nome_saida = $_POST["nome_saida"];
$id_curso = $_POST["id_curso"];

$query = mysqli_query($conecta, "INSERT INTO saida_profissional (nome_saida, id_curso) VALUES ('$nome_saida', '$id_curso')");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
        if (mysqli_affected_rows($conecta) != 0) {
            echo "
				<script type=\"text/javascript\">
					alert(\"$nome_saida, Saida cadastrada com Sucesso\");
				</script>
			";
            header("Location: ../listar_saida-profissionais_admin.php");
        } else {
            echo "
				
				<script type=\"text/javascript\">
					alert(\"Saida não foi cadastrada com Sucesso\");
				</script>
			";
        }
        ?>
    </body>
</html>
