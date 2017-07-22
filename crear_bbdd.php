<?php

/**
 * Created by PhpStorm.
 * User: sepla
 * Date: 18/07/2017
 * Time: 21:58
 */

function conectaDb()
{

    try {
        $db = new PDO("mysql:host=localhost", "seplarui", "seplarui");
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

        return ($db);
    } catch (PDOException $e) {
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";

        print "<p>Error: " . $e->getMessage() . "</p>\n";

        exit();
    }

}

$db=conectaDb();
$dbDb="gestion";
$consulta= "CREATE DATABASE $dbDb";
if($db->query($consulta)) {
    print "<p>La BBDD ha sido creada correctamente.</p>\n";
} else {
    print "<p>Error al crear la BBDD.</p>\n";
}

$tabla="CREATE TABLE `gestion`.`sol_inc` ( `id` INT NOT NULL AUTO_INCREMENT , `Tipo` VARCHAR(20) NOT NULL , `Asunto` VARCHAR(50) NOT NULL ,
 `Fecha` DATE NOT NULL , `Hora` TIME NOT NULL , `Zona_Sector` VARCHAR(20) NOT NULL ,
 `Trabajador` VARCHAR(50) NOT NULL , `Vehiculo` VARCHAR(10) NOT NULL , `Descripcion` VARCHAR(500) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";


if($db->query($tabla)) {
    print "<p>Tabla sol_inc creada correctamente</p>.\n";

} else {
    print "<p>Error al crear la tabla.\n";
}

$db=NULL;