<style>
    #boton{
        border-color: #2B2D42; 
        color:#2B2D42;
    } #boton:hover{
        background-color: #2B2D42;
        color: white;
    }

</style>

<div class="container-fluid">
        <h1 class="text-center mt-4">Contacto</h1>

        <div class="container d-flex p-3 mt-4" style="background-color: #2EC4B6;">
            <div class="container d-flex flex-column justify-content-center">
                <p class="fs-4">En caso de dudas, consultas o comentarios respecto a nuestros servicios o pedidos, porfavor utilizar el siguiente formulario para contactarnos.</p>
                <p class="fs-4">Responderemos su mensaje en 3-4 dias habiles.</p>
            </div>

            <div class="container">
                <form class="p-4" method="post" action="funcion/procesarForm.php">
                    <div class="container d-flex px-0 mb-3">

                        <div class="container">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input name="nombre" id="nombre" type="text" class="form-control" placeholder="nombre" required>
                        </div>
                        <div class="container">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input name="apellido" id="apellido" type="text" class="form-control" placeholder="apellido" required>
                        </div>
                    </div>
                    
                    <div class="container my-3 ">
                        <label for="email" class="form-label">Correo Electronico:</label>
                        <input name="email" id="email" type="email" class="form-control" placeholder="ejemplo@gmail.com" required>
                    </div>

                    <div class="container my-3">
                        <p class="fs-3 fw-semibold">Motivo de consulta</p>
                        <div class="form-check">
                            <label class="form-check-label" for="opcion"> Pedido </label>
                            <input class="form-check-input" type="radio" name="opcion" value="pedido" required>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="opcion"> Preguntas</label>
                            <input class="form-check-input" type="radio" name="opcion" value="preguntas">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="opcion"> Quejas </label>
                            <input class="form-check-input" type="radio" name="opcion" value="quejas">
                        </div>
                    </div>

                    <div class="container my-3">
                        <div class="form-floating">
                            <label for="textArea"></label>
                            <textarea class="form-control" placeholder="Escriba su consulta aquí." name="textArea" id="textArea" style="height: 200px" required></textarea>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-primary btn-lg" id="boton">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>