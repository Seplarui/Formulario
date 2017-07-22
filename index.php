<!DOCTYPE html>
<html lan="es">
<head>
    <link rel="stylesheet" href="css/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8">
    <title>Formulario de Envio</title>
</head>
<body>
<div class="row col-md-10 col-md-offset-24 ">
    <div class="panel panel-default col-md-8 col-md-offset-3">
        <div class="panel-heading">
            <h3 class="panel-title text-center" ><b>SOLICITUDES E INCIDENCIAS</b></h3>
        </div>
        <div class="panel-body">

    <div class="col-md-10 col-md-offset-24">

    <form action="enviar.php" method="post">
        <div class="form-group ">

            <!-- /*************TIPO***************/-->

            <select class="form-control" name="tipo" required>

                <option value="" selected="selected">Selecciona Tipo</option>
                <option value="Solicitud">Solicitud</option>
                <option value="Incidencia">Incidencia</option>

            </select>

           <!-- /**************ASUNTO*************/-->
            <label>Asunto</label>
            <input type="text" class="form-control " placeholder="Asunto" required maxlength="50" name="asunto"><br>
            <?php
            $fecha=date('d-m-Y');
            $hora=date('H:i:s');
            ?>

            <!--/******************FECHA**************/-->
            <label>Fecha</label>
            <input type="text" class="form-control" value="<?php echo $fecha ?>" required name="fecha" readonly="readonly" />

            <!--/*****************HORA***************/-->
            <label>Hora</label>
            <input type="text" class="form-control" value="<?php echo $hora?>" required  name="hora" readonly="readonly"/>

            <!--/*****************ZONA O SECTOR***************/-->
            <label>Zona o Sector</label>
            <input type="text" class="form-control" placeholder="Zona o Sector" required name="zona_sector" />

            <!--/******************TRABAJADOR**************/-->
            <label>Trabajador</label>
            <select class="form-control" name="trabajador" required>

                <option value="" selected="selected">Selecciona un Trabajador</option>
                <option value="trabajador_1">Trabajador 1</option>
                <option value="trabajador_2">Trabajador 2</option>
                <option value="trabajador_3">Trabajador 3</option>
                <option value="trabajador_4">Trabajador 4</option>
                <option value="trabajador_5">Trabajador 5</option>

            </select>

            <!--/*****************ZONA O SECTOR***************/-->
            <label>Vehículo</label>
            <input type="text" class="form-control" placeholder="Vehículo" required name="vehiculo" />

            <!--/*****************DESCRIPCION***************/-->
            <label>Descripción</label>
            <textarea class="form-control" required cols="10" rows="10" name="descripcion" maxlength="1000"></textarea>





        </div>
        <br/>

        <button type="submit" class="btn btn-default">Enviar</button>


    </form>
    </div>

        </div>


</div>

</div>

</body>
</html>