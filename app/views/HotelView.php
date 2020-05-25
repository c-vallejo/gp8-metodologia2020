<?php

class HotelView {
    private $formularioAlta;

    public function __construct() {
        $this->formularioAlta = '
            <!DOCTYPE html>
            <html> 
                <head> 
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>  </title>
                    <link rel="stylesheet" href="css/main.css">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
                </head>
                <body> 
                    <div>
                        <p id="tituloForm" class="lead">Agregar Reserva </p>
                    </div>
                    <div>
                    <form action="hotel" method="POST"> 
                        <div class="container-sm"> 

                            <div class="form-group">
                                <label for="inputNombreReserva"> Nombre de Reserva</label> 
                                <input type="text" class="form-control" name="nombre" id="inputNombreReserva">
                            </div>  

                            <div class="form-group"> 
                                <label for="inputCiudadDestino"> Ciudad de destino </label>
                                <input type="text" class="form-control" name="destino" id="inputCiudadDestino" >
                            </div>

                            <div class="form-group">
                                <label for="fechaInicio"> Fecha de inicio: </label>
                                <input type="date" class="form-control" name="fecha_inicio" id="fechaInicio">
                            </div>

                            <div class="form-group">
                                <label for="inputCheckIn"> Horario de Check In: </label> 
                                <input type="time" class="form-control" name="check_in_horario" id="inputCheckIn">
                            </div>  

                            <div class="form-group">
                                <label for="fechaFinalizacion"> Fecha de finalizacion </label>
                                <input type="date" class="form-control" name="fecha_fin" id="fechaFinalizacion">
                            </div>

                            <div class="form-group">
                                <label for="inputCheckOut"> Horario de Check Out</label> 
                                <input type="time" class="form-control" name="check_out_horario" id="inputCheckOut">
                            </div>  

                            <div class="form-group">
                                <label for="inputCodigoConfirmacion"> Codigo de confirmacion</label> 
                                <input type="text" class="form-control" name="codigo_confirm" id="inputCodigoConfirmacion">
                            </div>  

                            <div class="form-group">
                                <label for="inputCantidadNoches"> Cantidad de noches</label> 
                                <input type="text" class="form-control" name="cant_noches" id="inputCantidadNoches">
                            </div>  

                            <div class="form-group">
                                <label for="inputCantidadHab">  Cantidad de habitaciones</label> 
                                <input type="text" class="form-control" name="cant_habitaciones" id="inputCantidadHab">
                            </div> 

                            <div class="form-group">
                                <label for="inputCantidadPersonas"> Cantidad de personas: </label> 
                                <input type="text" class="form-control" name="cant_personas" id="inputCantidadPersonas">
                            </div>  

                            <div class="form-group">
                                <label for="inputDescripcion">Descripcion:</label>
                                <input type="text" class="form-control" name="descripcion" id="InputDescripcion">
                            </div>

                            <button type="submit" id="submitFormAltaReserva"  class="btn btn-dark"> Agregar </button>
                        </div>
                    </form>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
                </body>
            </html>
            ';
    }

    public function displayHotel($hotel) {
        
    }

    public function displayForm() {
        echo $this->formularioAlta;
    }
}
