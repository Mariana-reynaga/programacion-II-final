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
                    "cantidad"=>$producto
                ];
            }
        }
        //eliminar un item
        //devolver todo el carro
        public function carroCompleto(){
            if (isset($_SESSION["carrito"])) {
                return $_SESSION["carrito"];
            }
            return [];
        }

        //actualizar cantidades
        //vaciar el carrito
        //que devuelva el precio total


    }

?>