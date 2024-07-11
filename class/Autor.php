<?php
    class Autor{
        protected $ID;
        protected $nombre_autor;

        /*Get the value of ID*/
        public function getID()
        {
                return $this->ID;
        }

        /*Set the value of ID*/
        public function setID($ID): self
        {
                $this->ID = $ID;

                return $this;
        }

        /*Get the value of nombre_autor*/
        public function getNombreAutor()
        {
                return $this->nombre_autor;
        }

        /*Set the value of nombre_autor*/
        public function setNombreAutor($nombre_autor): self
        {
                $this->nombre_autor = $nombre_autor;

                return $this;
        }

        public function get_x_id(int $ID) :?self /*el ":?" significa que A VECES no va a devolver un autor*/ {
            $conexion_con_DB = (new Conexion())->getConexion();
            $query = "SELECT * FROM `tabla-autor` WHERE ID = $ID";
            $PDOStatement = $conexion_con_DB->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();
            $resultado = $PDOStatement->fetch();
    
            return isset($resultado) ? $resultado : null; //el isset checkea que este seteado el id, si existe devuelve resultado, si no devuelve un null
        }

        //Traer la lista de Autores completa
        public function autores_completo(){
                $conexion_con_DB = (new Conexion())->getConexion();
                $query = "SELECT * FROM `tabla-autor`";
                $PDOStatement = $conexion_con_DB->prepare($query);
                $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStatement->execute();
        
                $listaAutores = $PDOStatement->fetchAll();
        
                return $listaAutores ? $listaAutores : [];                
        }

        public function insert($nombre_autor){
                $conexion = (new Conexion())->getConexion();
                $query = "INSERT INTO `tabla-autor`(`ID`, `nombre_autor`) VALUES (NULL, :nombre_autor)";

                $PDOStatement = $conexion->prepare($query);
                $PDOStatement->execute([
                        "nombre_autor" => htmlspecialchars($nombre_autor),
                ]);
        }

        public function eliminarAutor($ID){
                $conexion_con_DB = (new Conexion())->getConexion();
                $query = "DELETE FROM `tabla-autor` WHERE `ID` = $ID";
                $PDOStatement = $conexion_con_DB->prepare($query);
                $PDOStatement->execute();  
        }
        
        public function editarAutor($nombre_autor, $ID){
                $conexion_con_DB = (new Conexion())->getConexion();
                $query = "UPDATE `tabla-autor` SET `ID`= :ID ,`nombre_autor`= :nombre_autor WHERE `ID` = $ID";
                
                $PDOStatement = $conexion_con_DB->prepare($query);
                $PDOStatement->execute([
                        "nombre_autor" => htmlspecialchars($nombre_autor),
                        "ID" => htmlspecialchars($ID),
                ]);
        }
    }

?>