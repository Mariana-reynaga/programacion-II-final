<?php 
    class Carrito{
        protected $ID;
        protected $user_ID;
        protected $catalogo_ID;
        protected $cantidad;
        protected $precio_indv;
        public $fecha;

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
        public function guardar($user_ID, $catalogo_ID, $cantidad, $precio_indv ,$fecha){
            $conexion_con_DB = (new Conexion())->getConexion();
            $query = "INSERT INTO `carro`(`ID`, `user_ID`, `catalogo_ID`, `cantidad`, `precio_indv`, `fecha`) VALUES (NULL,:user_ID , :catalogo_ID , :cantidad , :precio_indv , :fecha)";
            $PDOStatement = $conexion_con_DB->prepare($query);

            $PDOStatement->execute([
                    "user_ID" => htmlspecialchars($user_ID),
                    "catalogo_ID" => htmlspecialchars($catalogo_ID),
                    "cantidad" => htmlspecialchars($cantidad),
                    "precio_indv" => htmlspecialchars($precio_indv),
                    "fecha" => htmlspecialchars($fecha)
            ]);

        }

        //Traer la lista de pedidos completa
        public function pedidos_completo(){
            $conexion_con_DB = (new Conexion())->getConexion();
            $query = "SELECT * FROM `carro`";
            $PDOStatement = $conexion_con_DB->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();
    
            $listaPedidos = $PDOStatement->fetchAll();
    
            return $listaPedidos ? $listaPedidos : []; 
        }
        
        //Traer el carro por fecha y usuario
        public function pedidos_x_fecha_usuario(int $ID){
            $conexion_con_DB = (new Conexion())->getConexion();
            $query = "SELECT *, CAST(`fecha` AS DATE) AS dia FROM `carro` WHERE `user_ID` = $ID GROUP BY CAST(`fecha` AS DATE), `ID`, `user_ID`, `catalogo_ID`, `cantidad` ORDER BY dia";
            $PDOStatement = $conexion_con_DB->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();
    
            $listaCarros = $PDOStatement->fetchAll();
    
            return $listaCarros ? $listaCarros : []; 
        }

        /*Traer el nombre del usuario*/
        public function getUserName(){
            $user_ID = (new Usuario()) ->user_x_id($this->user_ID);
            return $user_ID->getNomUsuario();
        }

        /*Get the value of catalogo_ID*/
        public function getCatalogoID(){
            $prod = (new Manga())->catalogo_x_id($this->catalogo_ID);
            return $prod->getTitulo();
        }

        //Traer el precio
        public function getPrecio(){
            $prod = (new Manga())->catalogo_x_id($this->catalogo_ID);
            return $prod->getPrecio();
        }

        /*Get the value of cantidad*/
        public function getCantidad()
        {
                return $this->cantidad;
        }

        /*Traer el ID de tabla carro*/
        public function getID()
        {
                return $this->ID;
        }

        /*Get the value of fecha*/
        public function getFecha()
        {
                return $this->fecha;
        }
    }
?>