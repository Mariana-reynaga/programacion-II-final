<?php
    class Autentificar{
        public function log_in($usuario, $password){
            $usuario = (new Usuario())->get_x_usuario($usuario);

            if(isset($usuario)){
                if($usuario->getPassword() == $password){
                    $dataLogIn["usuario"] = $usuario->getNomUsuario();
                    $dataLogIn["rol"] = $usuario->getRol();
                    $dataLogIn["id"] = $usuario->getID();
                    $_SESSION["login"] = $dataLogIn;
                    return true;
                }
            }
            return false;
        }
        
        public function log_out(){
            if(isset($_SESSION["login"])){
                unset($_SESSION["login"]); 
            }
        }

    }
?>