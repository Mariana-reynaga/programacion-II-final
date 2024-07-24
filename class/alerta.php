<?php
    class Alerta{
        public function agregar($mensaje, $tipo){
            $_SESSION["alertas"] []= [ // cada vez que llamo a la función se añade una nueva alerta
                "mensaje" => $mensaje,
                "tipo" => $tipo
            ];
        }

        public function get_alertas(){
            if ( !empty( $_SESSION["alertas"] ) ) {
                $alertas = "";

                foreach ( $_SESSION["alertas"] as $alerta ) {
                    $alertas .= $this -> imprimir_block( $alerta["mensaje"], $alerta["tipo"] );
                }

                $this -> limpiar();

                return $alertas;
            }
        }

        public function imprimir_block($mensaje, $tipo){
            $div = "<div class='alert alert-$tipo alert-dismissible fade show' role='alert'>";

            $div .= $mensaje;
                
            $div .="<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>";

            return $div;
        }

        public function limpiar(){
            $_SESSION["alertas"] = []; 
        }
    }

?>