<?php
require('bd.php');
require('Materia.php');
require('header.php');

$materia= new Materia();

$id_maestro=$_POST['id_maestro'];
$materia->datosMaestro($id_maestro);
$materia->materiasAsignadas($id_maestro);
$materia->asignarMateriaMaestro($id_maestro);




?>