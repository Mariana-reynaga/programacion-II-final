<?php 
    class Carrito{
        //metodos:
        //agregar un item
        //por ahora esto se tiene que guardar en session, el carro con relacion de muchos a muchos es para el final
        public function agregarProd(int $productoID, int $cantidad){

            $producto = (new Manga())->catalogo_x_id($productoID);
            
            if ($producto) {
                $_SESSION['carrito'][$productoID]=[
                    "titulo"=> $producto->getTitulo(),
                    "portada"=>$producto->getPortada(),
                    "precio"=>$producto->getPrecio(),
                    "cantidad"=> $cantidad,
                ];
            }
        }

        //funcion para calcular el subtotal
        public function calcular(int $precio, int $cantidad){
            $total = $precio*$cantidad;
            return $total;
        }

        //eliminar un item
        public function eliminar_del_carro($id){
            if (isset($_SESSION["carrito"][$id])) {
                unset($_SESSION["carrito"][$id]);
            }
        }


        //devolver todo el carro
        public function carroCompleto() :array{
            if (isset($_SESSION["carrito"])) {
                return $_SESSION["carrito"];
            }
            return [];
        }

        //actualizar cantidades
        public function actualizar_carro(array $cantidades){
            foreach ($cantidades as $id => $cantidad) {
                if (isset($_SESSION["carrito"][$id])) {

                    $_SESSION["carrito"][$id]["cantidad"] = $cantidad;

                }
        
            }

        }

        //vaciar el carrito
        public function eliminar_Carro(){
            $_SESSION["carrito"] = [];
        }

    }

?>