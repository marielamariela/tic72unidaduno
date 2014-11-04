<?php

require('Materia.php');

require('header.php');
require('bd.php');


$materia=new Materia();
//$materia->seleccionaMaestro();

if (isset($_REQUEST['accion'])){
    $accion= $_REQUEST['accion'];
}
else
{
 $accion=0;
}
if (isset($_REQUEST['maestro'])){
    $id= $_REQUEST['maestro'];
}
else
{
$id=0;
}
if (isset($_REQUEST['materia'])){
    $id_materia= $_REQUEST['materia'];
}
else
{
$id_materia=0;
}
//echo"accion: $accion , maestro $id , materia: $id_materia";

if($accion==0){

        $materia->seleccionaMaestro($id);
}
    if ($accion==1)
    {
        $materia->createMaestroMateria($id, $id_materia);
        $materia->seleccionaMaestro($id);
    }
    if ($accion==3)
    {
     $materia->deleteMaestroMateria($id, $id_materia);
        $materia->seleccionaMaestro($id);
    }



require('footer.php');
?>