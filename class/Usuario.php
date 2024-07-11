<?php 
    class Usuario{
        protected $ID;
        protected $nombre;
        protected $nom_usuario;
        protected $email;
        protected $password;
        protected $rol;

        /*Get the value of ID*/
        public function getID()
        {       
            return $this->ID;
        }

        /*Get the value of nombre*/
        public function getNombre()
        {       
            return $this->nombre;
        }

        /*Get the value of nom_usuario*/
        public function getNomUsuario()
        {       
            return $this->nom_usuario;
        }

        /*Get the value of email*/
        public function getEmail()
        {       
            return $this->email;
        }

        /*Get the value of password*/
        public function getPassword()
        {       
            return $this->password;
        }

        /*Get the value of rol*/
        public function getRol()
        {       
            return $this->rol;
        }

        public function get_x_usuario(string $nom_usuario) :? self
        {
            $conexion_con_DB = (new Conexion())->getConexion();
            $query = "SELECT * FROM `tabla-usuario` WHERE `nom_usuario` =  :nom_usuario";
            $PDOStatement = $conexion_con_DB->prepare($query);

            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class); 

            $PDOStatement->execute([
                "nom_usuario" => $nom_usuario
            ]);

            $resultado = $PDOStatement->fetch();
    
            return $resultado ? $resultado : null; 
        }
    }
?>