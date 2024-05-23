<?php

class Manga{
    //atributos
    protected $ID;
    protected $portada_ID;
    protected $autor_ID;
    protected $titulo;
    protected $sinopsis;
    protected $genero;
    protected $volumen;
    protected $precio;
    protected $publicacion;

    //metodos

    //para traer desde la base de datos
    public function catalogo(){  //catalogo Completo

        $catalogo = [];
        $conexion = new Conexion();
        $db = $conexion->getConexion();
        $query = 'SELECT * FROM `tabla-catalogo`';
        $PDOStament = $db->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, Manga::class);
        $PDOStament->execute();

        while ($comic = $PDOStament->fetch()) {
            $catalogo[] = $comic;
        }

        return $catalogo;
    }

    public function catalogo_x_categoria(string $genero)
    {
        $cat_x_genero = [];
        $conexion = ( new Conexion() )->getConexion();
        $query = "SELECT * FROM `tabla-catalogo` WHERE `genero` = '$genero'";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute();
        $cat_x_genero = $PDOStament->fetchAll();
        return $cat_x_genero;
    }

    public function catalogo_x_id(int $ID)
    {
        $conexion = ( new Conexion() )->getConexion();
        $query = "SELECT * FROM `tabla-catalogo` WHERE ID = $ID";
        $PDOStament = $conexion->prepare($query);
        $PDOStament->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStament->execute();
        $manga = $PDOStament->fetch();
        return isset($manga) ? $manga : false;
    }

    /*Get the value of ID*/
    public function getID()
    {
        return $this->ID;
    }

    /*Get the value of portada_ID*/
    public function getPortadaID()
    {
        return $this->portada_ID;
    }

    /*Get the value of autor_ID*/
    public function getAutorID()
    {
        $autor = (new Autor()) ->get_x_id($this->autor_ID);
        return $autor->getNombreAutor();
    }

    /*Get the value of titulo*/
    public function getTitulo()
    {
        return $this->titulo;
    }

    /*Get the value of sinopsis*/
    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    /*Get the value of genero*/
    public function getGenero()
    {
        return $this->genero;
    }

    /*Get the value of volumen*/
    public function getVolumen()
    {
        return $this->volumen;
    }

    /*Get the value of precio*/
    public function getPrecio()
    {
        return $this->precio;
    }

    /*Get the value of publicacion*/
    public function getPublicacion()
    {
        return $this->publicacion;
    }
} 