<?php
    require_once "../funcion/cargarClass.php";

    $conexion = new Conexion();
    
    // $manga = (new Manga())->catalogo();

    $carroF = (new Carrito())->pedidos_x_fecha();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/estilo.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Test</title>
</head>
<body>
    <h1>Testeo</h1>
    <!-- <div class="container">
        <form action="imgSubirTest.php" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
            
                <label for="portada" class="form-label">portada</label>
                <input class="form-control" type="file" id="portada" name="portada">

            </div>

            <div class="col-md-6 mb-3">

                <label for="txtAlt" class="form-label">texto Alt</label>
                <textarea name="txtAlt" id="txtAlt" class="form-control"></textarea>

            </div>

            <button type="submit" class="btn btn-primary">Cargar</button>
        </form>
    </div> -->

    <!-- <div class="container">
        <div class="row row-cols-2">
            <div class="col">
                <?php foreach ($manga as $producto){ ?>
                    <p><?= $producto->getTitulo() ?></p>
                <?php }?>
            </div>

            <div class="col">
                <?php foreach ($manga as $producto){ ?>
                    <p><?= $producto->getPortadaID() ?></p>
                <?php }?>
            </div>
        </div>
    </div> -->

    <?php
        // echo "<pre>";
        // print_r($carroF);
        // echo "</pre>";
        
        $pedido_x_fecha = array();

        foreach($carroF as $key => $valuesAry){
            $date = date('d', strtotime($valuesAry->fecha));
            $pedido_x_fecha[$date][] = $valuesAry;
        }

        foreach ($pedido_x_fecha as $dias) {
            echo "<br>";
            echo "aca comienza";
            $total = 0;
            foreach ($dias as $key) {
                $p = intval($key->getPrecio());
                $total .= $p;?>
                <p><?= $key->getCatalogoID()?></p>
                <p><?= $key->getPrecio()?></p>

            <?php }
            echo "<br>";
            echo "el total es:".$total;
            echo "<br>";
            echo "aca termina";
            echo "<br>";
        }
    ?>
    

</body>
</html>