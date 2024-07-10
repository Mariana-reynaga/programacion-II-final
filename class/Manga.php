<?php

class Manga{
    //atributos
    protected $ID;
    protected $portada_ID;
    protected $autor_ID;
    protected $titulo;
    protected $sinopsis;
    protected $genero_ID;
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

    public function catalogo_x_categoria(int $genero_ID)
    {
        $cat_x_genero = [];
        $conexion = ( new Conexion() )->getConexion();
        $query = "SELECT * FROM `tabla-catalogo` WHERE `genero_ID` = '$genero_ID'";
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

    /*Trae la dirección de portada*/
    public function getPortada()
    {
        $portadaID = (new Portada())->get_x_id($this->portada_ID);
        return $portadaID->getImagenPortada();
    }

    /*Trae el ID de portada*/
    public function getPortadaID()
    {
        $portada_id = (new Portada())->get_x_id($this->portada_ID);
        return $portada_id->getID();
    }

    /*Get the value of alt text*/
    public function getTextoAlt()
    {
        $txt = (new Portada())->get_x_id($this->portada_ID);
        return $txt->getTextoAlt();
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

    /*Get the nombre of genero*/
    public function getNombreGenero()
    {
        $genero = (new Genero()) ->get_x_id($this->genero_ID);
        return $genero->getGenero();
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

    public function insert($portada_ID, $autor_ID, $genero_ID, $titulo, $sinopsis, $volumen, $precio, $publicacion){
        $conexion_con_DB = (new Conexion())->getConexion();
        $query = "INSERT INTO `tabla-catalogo`(`ID`, `portada_ID`, `autor_ID`, `genero_ID`, `titulo`, `sinopsis`, `volumen`, `precio`, `publicacion`) VALUES (NULL, :portada_ID, :autor_ID, '$genero_ID', :titulo, :sinopsis, :volumen, :precio, :publicacion)";
        echo $query;
        $PDOStament = $conexion_con_DB->prepare($query);
        $PDOStament->execute([
            "portada_ID" => htmlspecialchars($portada_ID),
            "autor_ID" => htmlspecialchars($autor_ID),
            "titulo" => htmlspecialchars($titulo),
            "sinopsis" => htmlspecialchars($sinopsis),
            "volumen" => htmlspecialchars($volumen),
            "precio" => htmlspecialchars($precio),
            "publicacion" => htmlspecialchars($publicacion)
        ]);                
    }

    public function eliminar($ID){
        $conexion_con_DB = (new Conexion())->getConexion();
        $query = "DELETE FROM `tabla-catalogo` WHERE `ID` = $ID";
        $PDOStament = $conexion_con_DB->prepare($query);
        $PDOStament->execute();  
    }

    public function editarManga($autor_ID, $genero_ID, $titulo, $sinopsis, $volumen, $precio, $publicacion, $ID){
        $conexion_con_DB = (new Conexion())->getConexion();
        $query = "UPDATE `tabla-catalogo` SET `autor_ID`= :autor_ID,`genero_ID`= $genero_ID,`titulo`= :titulo,`sinopsis`= :sinopsis,`volumen`= :volumen,`precio`= :precio,`publicacion`= :publicacion WHERE `ID` = $ID";

        $PDOStament = $conexion_con_DB->prepare($query);
        $PDOStament->execute([
            "autor_ID" => htmlspecialchars($autor_ID),
            // "genero_ID" => htmlspecialchars($genero_ID),
            "titulo" => htmlspecialchars($titulo),
            "sinopsis" => htmlspecialchars($sinopsis),
            "volumen" => htmlspecialchars($volumen),
            "precio" => htmlspecialchars($precio),
            "publicacion" => htmlspecialchars($publicacion)
        ]);
    }

} 