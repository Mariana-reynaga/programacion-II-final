<?php 
    class Genero{
        protected $ID;
        protected $genero;

        /*Get the value of ID*/
        public function getID()
        {       return $this->ID;
        }

        /*Set the value of ID*/
        public function setID($ID): self
        {       $this->ID = $ID;
       return $this;
        }

        /*Get the value of genero*/
        public function getGenero()
        {       return $this->genero;
        }

        /*Set the value of genero*/
        public function setGenero($genero): self
        {   $this->genero = $genero;
            return $this;
        }

        //Generos por ID
        public function get_x_id(int $idGenero){
            $conexion_con_DB = (new Conexion())->getConexion();
            $query = "SELECT * FROM `tabla-genero` WHERE `ID` = '$idGenero'";
            $PDOStatement = $conexion_con_DB->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();
            $resultado = $PDOStatement->fetch();
    
            return isset($resultado) ? $resultado : null;
        }

        //Traer la lista de Generos completa
        public function genero_completo(){
                $conexion_con_DB = (new Conexion())->getConexion();
                $query = "SELECT * FROM `tabla-genero`";
                $PDOStatement = $conexion_con_DB->prepare($query);
                $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStatement->execute();
        
                $listaGenero = $PDOStatement->fetchAll();
        
                return $listaGenero ? $listaGenero : [];                
        }

        public function insert($genero){
            $conexion = (new Conexion())->getConexion();
            $query = "INSERT INTO `tabla-genero`(`ID`, `genero`) VALUES (NULL , :genero)";

            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                        "genero" => htmlspecialchars($genero),
                ]);
        }

        public function eliminarGenero($ID){
            $conexion_con_DB = (new Conexion())->getConexion();
            $query = "DELETE FROM `tabla-genero` WHERE `ID` = $ID";
            $PDOStatement = $conexion_con_DB->prepare($query);
            $PDOStatement->execute();  
        }

        public function editarGenero($genero, $ID){
            $conexion_con_DB = (new Conexion())->getConexion();
            $query = "UPDATE `tabla-genero` SET `ID`= :ID,`genero`= :genero WHERE `ID` = $ID";
            
            $PDOStatement = $conexion_con_DB->prepare($query);
            $PDOStatement->execute([
                    "genero" => htmlspecialchars($genero),
                    "ID" => htmlspecialchars($ID),
            ]); 
        }
    }
?>