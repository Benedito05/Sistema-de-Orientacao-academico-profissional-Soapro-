<?php

ob_start();
if (($_SESSION['EstudanteId_estudante'] == "") || ($_SESSION['EstudanteUsuario'] == "") || ($_SESSION['EstudanteSenha'] == "")) {
    unset($_SESSION['EstudanteId_estudante'], 
            $_SESSION['EstudanteNome'], 
            $_SESSION['EstudanteData_nasc'],
             $_SESSION['EstudanteTelefone'],
            $_SESSION['EstudanteEmail'],
            $_SeSSION['EstudanteCurso_medio'],
            $_SeSSION['EstudanteUsuario'],
            $_SESSION['EstudanteSenha']);
    //Mensagem de Erro
   echo "		<script type=\"text/javascript\">
					alert(\"Erro de Login\");
                                      
				</script>
			";

    //Manda o usuário para a tela de login
    header("Location: login.php");
}
