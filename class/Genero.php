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
                $PDOStament = $conexion_con_DB->prepare($query);
                $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
                $PDOStament->execute();
        
                $listaGenero = $PDOStament->fetchAll();
        
                return $listaGenero ? $listaGenero : [];                
        }

    }

?>