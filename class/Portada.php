<?php
    class Portada{
        protected $ID;
        protected $imagen_portada;
        protected $texto_alt;

        /*Get the value of ID*/
        public function getID()
        {       return $this->ID;
        }

        /*Set the value of ID*/
        public function setID($ID): self
        {   $this->ID = $ID;
            return $this;
        }

        /*Get the value of imagen_portada*/
        public function getImagenPortada()
        {   return $this->imagen_portada;
        }

        /*Set the value of imagen_portada*/
        public function setImagenPortada($imagen_portada): self
        {   $this->imagen_portada = $imagen_portada;
            return $this;
        }

        /*Get the value of texto_alt*/
        public function getTextoAlt()
        {   return $this->texto_alt;
        }

        /*Set the value of texto_alt*/
        public function setTextoAlt($texto_alt): self
        {       $this->texto_alt = $texto_alt;
                return $this;
        }

        public function get_x_id(int $ID) :?self{
            $conexion_con_DB = (new Conexion())->getConexion();
            $query = "SELECT * FROM `tabla-portada` WHERE `ID` = $ID";
            $PDOStatement = $conexion_con_DB->prepare($query);
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatement->execute();
            $resultado = $PDOStatement->fetch();
    
            return isset($resultado) ? $resultado : null;
        }

        public function subirImagen($imagen, string $directorio) : string{
        if( !empty($imagen["tmp_name"]) ){
                $name = uniqid()."-".$imagen["name"];
                $fileUpload = move_uploaded_file($imagen["tmp_name"], "$directorio/$name");   
                if($fileUpload){
                    return $name;
                }else{
                    throw new Exception("No se pudo subir la imagen");
                }
            }
        }

        public function insertarImg($imagen_portada, $texto_alt){
            $conexion_con_DB = (new Conexion())->getConexion();

            $query= "INSERT INTO `tabla-portada`(`ID`, `imagen_portada`, `texto_alt`) VALUES (NULL, :imagen_portada, :texto_alt)";
            $PDOStament = $conexion_con_DB->prepare($query);
            $PDOStament->execute([
                'imagen_portada' => htmlspecialchars($imagen_portada),
                'texto_alt' => htmlspecialchars($texto_alt),
            ]);
            
            return $conexion_con_DB->lastInsertId();
        }
    }

?>