<div class="container-fluid">
        <h1 class="text-center mt-4">Contacto</h1>

        <div class="container d-flex p-3 mt-4" style="background-color: #E1E1E1;">
            <div class="container d-flex flex-column justify-content-center">
                <p>En caso de dudas, consultas o comentarios respecto a nuestros servicios o pedidos, porfavor utilizar el siguiente formulario para contactarnos.</p>
                <p>Responderemos su mensaje en 3-4 dias habiles.</p>
            </div>

            <div class="container">
                <form>
                    <div class="container d-flex px-0 mb-3">

                        <div class="container">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input id="nombre" type="text" class="form-control" placeholder="nombre">
                        </div>
                        <div class="container">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input id="apellido" type="text" class="form-control" placeholder="apellido">
                        </div>
                    </div>
                    
                    <div class="container my-3 ">
                        <label for="email" class="form-label">Correo Electronico:</label>
                        <input id="email" type="email" class="form-control" placeholder="ejemplo@gmail.com">
                    </div>

                    <div class="container my-3">
                        <p class="fs-3 fw-semibold">Motivo de consulta</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1"> Pedido </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1"> Preguntas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1"> Quejas </label>
                        </div>
                    </div>

                    <div class="container my-3">
                        <div class="form-floating">
                            <label for="textArea">Escriba su consulta aquí.</label>
                            <textarea class="form-control" placeholder="Escriba su consulta aquí." id="textArea" style="height: 200px"></textarea>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-outline-primary btn-lg">Enviar</button>
                </form>
            </div>
        </div>
    </div>