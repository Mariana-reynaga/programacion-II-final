<?php
    class Autentificar{
        public function log_in_admin($usuario, $password){
            $usuario = (new Usuario())->get_x_usuario($usuario);
            
            if(isset($usuario)){
                if ($usuario->getRol() == 'admin') {
                    if($usuario->getPassword() == $password){
                        $dataLogIn["usuario"] = $usuario->getNomUsuario();
                        $dataLogIn["id"] = $usuario->getID();
                        $_SESSION["login"] = $dataLogIn;
                        return true;
                    }
                }
            }
            return false;
        }

        public function log_in_user($usuario, $password){
            $usuario = (new Usuario())->get_x_usuario($usuario);
            
            if(isset($usuario)){
                if ($usuario->getRol() == 'usuario') {
                    if($usuario->getPassword() == $password){
                        $dataLogIn["usuario"] = $usuario->getNomUsuario();
                        $dataLogIn["id"] = $usuario->getID();
                        $_SESSION["login"] = $dataLogIn;
                        return true;
                    }
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