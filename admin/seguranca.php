<?php

ob_start();
if (($_SESSION['AdminId'] == "") || ($_SESSION['AdminUsuario'] == "") || ($_SESSION['AdminSenha'] == "")) {
    unset($_SESSION['AdminId'], 
            $_SESSION['AdminNome'], 
            $_SESSION['AdminUsuario'], 
            $_SESSION['AdminSenha'],
            $_SeSSION['AdminEmail'],
            $_SESSION['AdminNivel_Acesso']);
    //Mensagem de Erro
   echo "		<script type=\"text/javascript\">
					alert(\"Erro de Login\");
                                      
				</script>
			";

    //Manda o usuário para a tela de login
    header("Location: login.php");
}
