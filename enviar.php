<?php
/**
 * Created by PhpStorm.
 * User: sepla
 * Date: 15/07/2017
 * Time: 13:14
 */

require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$tipo=$_POST['tipo'];
$asunto=$_POST['asunto'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$zona_sector=$_POST['zona_sector'];
$trabajador=$_POST['trabajador'];
$vehiculo=$_POST['vehiculo'];
$descripcion=$_POST['descripcion'];

//$completo=$tipo . \r\n.$asunto . \r\n . $fecha . \r\n  .$hora. \r\n . $zona_sector. \r\n . $trabajador. \r\n . $vehiculo .\r\n .$descripcion;

$cuerpo="
    Tipo: $tipo
    Asunto: $asunto
    Fecha: $fecha
    Hora: $hora
    Zona o Sector: $zona_sector
    Trabajador: $trabajador
    Vehículo: $vehiculo
    Descripción: 
    $descripcion
";

$mail= new PHPMailer();


/**CONFIGURACIÓN PHP MAILER **/

$mail->isSMTP();
$mail->isSMTP(true);
$mail->Host='smtp.gmail.com';
$mail->SMTPAuth=true;
$mail->Username='';
$mail->Password='';

$mail->SMTPSecure='tls';
$mail->Port=587;

/*=========================*/

/** Configuración del correo a enviar. */
$mail->setFrom(''); //REMITENTE
$mail->addAddress(''); //DESTINATARIO


$mail->Subject=$tipo .' '.$asunto;
$mail->Body=$cuerpo;

/*=========================*/

/**Envio del EMAIL **/

$mail->send();

/*=========================*/

/*====================================INSERTAR EN BBDD=============================================*/

$usuario="seplarui";
$pass="seplarui";
try {
    $conexion= new PDO("mysql:host=localhost;dbname=gestion", $usuario, $pass);


} catch (PDOException $e) {
    print "Error de conexion: ".$e->getMessage() ."<br/>";
    die();
}

$consulta=$conexion->prepare('INSERT into sol_inc(Tipo, Asunto, Fecha, Hora, Zona_Sector, Trabajador, Vehiculo, Descripcion) VALUES (:Tipo, :Asunto, :Fecha, :Hora, :Zona_Sector,:Trabajador, :Vehiculo,:Descripcion)');

//$datos=array('Asunto'=>$asunto, 'Fecha'=>$fecha,'Hora'=>$hora,'Zona_Sector'=>$zona_sector, 'Trabajador'=>$trabajador, 'Vehiculo'=>$vehiculo, 'Descripcion'=>$descripcion);

$datos=array('Tipo'=>$tipo,'Asunto'=>$asunto, 'Fecha'=>$fecha,'Hora'=>$hora,'Zona_Sector'=>$zona_sector, 'Trabajador'=>$trabajador, 'Vehiculo'=>$vehiculo, 'Descripcion'=>$descripcion);

$consulta->execute($datos);

?>
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

                <table class="table table-bordered table-striped">
                    <tr>
                        <td>Tipo</td>
                        <td><?php echo $tipo ?></td>
                    </tr>
                    <tr>
                        <td>Asunto</td>
                        <td><?php echo $asunto ?></td>
                    </tr>
                    <tr>
                        <td>Fecha</td>
                        <td><?php echo $fecha ?></td>
                    </tr>
                    <tr>
                        <td>Hora</td>
                        <td> <?php echo $hora ?></td>
                    </tr>
                    <tr>
                        <td>Zona o Sector</td>
                        <td><?php echo $zona_sector ?></td>
                    </tr>
                    <tr>
                        <td>Trabajador</td>
                        <td><?php echo $trabajador ?></td>
                    </tr>
                    <tr>
                        <td>Vehiculo</td>
                        <td><?php echo $vehiculo ?></td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td><?php echo $descripcion ?></td>
                    </tr>
                    <tr>
                        <td><input type="button" class="btn btn-success" onclick="window.print();" value="Imprimir"></td>
                    </tr>


                </table>

            </div>
        </div>
    </div>
</div>
</body>
</html>











