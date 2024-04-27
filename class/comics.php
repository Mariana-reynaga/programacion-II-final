<?php

class comic{
    //atributos
    protected $id;
    protected $nombre;
    protected $autor;
    protected $volumen;
    protected $precio;
    protected $portada;

    //metodos

    //para traer el catalogo desde el json
    public function (){
        $catalogo;
        $jsonProductos = file_get_contents("productos.json");
        $json_datos = json_decode($jsonProductos, true);

        foreach($json_data as $comicArray){
            $manga = new comic;

            $manga-> $id = $comicArray["id"];
            $manga-> $nombre = $comicArray["nombre"];
            $manga-> $autor = $comicArray["autor"];
            $manga-> $volumen = $comicArray["volumen"];
            $manga-> $precio = $comicArray["precio"];
            $manga-> $portada = $comicArray["portada"];

            $catalogo [] = $manga; //hago el push
        }

        return $catalogo;
    }
}