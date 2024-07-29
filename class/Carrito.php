<?php 
    class Carrito{
        protected $ID;
        protected $user_ID;
        protected $catalogo_ID;
        protected $cantidad;

        //metodos:
        //agregar un item
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

        //guardar en la base de datos
        public function guardar($user_ID, $catalogo_ID, $cantidad){
            $conexion_con_DB = (new Conexion())->getConexion();
            $query = "INSERT INTO `carro`(`ID`, `user_ID`, `catalogo_ID`, `cantidad`) VALUES (NULL, :user_ID, :catalogo_ID, :cantidad)";
            $PDOStatement = $conexion_con_DB->prepare($query);

            $PDOStatement->execute([
                    "user_ID" => htmlspecialchars($user_ID),
                    "catalogo_ID" => htmlspecialchars($catalogo_ID),
                    "cantidad" => htmlspecialchars($cantidad)
            ]);

        }
    }

?>