<?php
session_start();

include_once("../conexao.php");
$id_saida			= $_POST["id_saida"];
$nome_curso_superior 		= $_POST["nome_curso_superior"];
$nome_saida 			= $_POST["nome_saida"];
$query = mysqli_query($conecta,"UPDATE saida_profissional set nome_curso_superior ='$nome_curso_superior', nome_saida = '$nome_saida' WHERE id_saida='$id_saida'");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"> 
	</head>

        
	<body>
                    <?php
		if (mysqli_affected_rows($conecta) != 0 ){
                    header("location: ../listar_saida-profissionais_admin.php");
			echo "
				<script type=\"text/javascript\">
					alert(\"Saida editada com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				
				<script type=\"text/javascript\">
					alert(\"Saida não foi editada com Sucesso.\");
				</script>
                               
			";		   

		}

		?>
	</body>
</html>
