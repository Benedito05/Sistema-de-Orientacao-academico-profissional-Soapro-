<?php

Class Help_Function{
    
    public function verificarUsuarios(){
        
        include_once("conexao.php");
        $result = mysqli_query($conecta, "SELECT * FROM usuarios");
        $resultado = mysqli_fetch_assoc($result);
        
        if(count($resultado) < 1){
            
            return 'no_user';
        
        }else{
            
            return 'user';
            
        }
    }
    
}

