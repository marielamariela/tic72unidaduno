<?php
require('Grupo.php');

require('header.php');
require('bd.php');

$grupoobj=new Grupo();

$grupoobj->Alumnos();

if (isset($_REQUEST['accion'])){
    $accion= $_REQUEST['accion'];
    //echo"$accion  accion";
}
else
{
    $accion=0;
}

if (isset($_REQUEST['grupo'])){
    $grupo= $_REQUEST['grupo'];
    echo"$grupo group";
}
else
{
    $grupo=0;
}
if (isset($_REQUEST['alumno'])){
    $alumnos= count($_REQUEST['alumno']);

    for($x=0; $x<$alumnos; $x++)
     {

         $alumno2=$_REQUEST['alumno'][$x];
         $sql04= "SELECT  * FROM usuario WHERE Id=$alumno2 ";
         $result06=mysql_query($sql04) or die ("error en $sql06");

         while($field = mysql_fetch_array($result06)){
             $nombre= $field['Nombre'];
             $idalumno3= $field['Id'];
         }

        /* echo"$sql04 sql04 <br>";
         echo"$nombre nombre alumno <br>";
         echo"$idalumno3  alumnoxxx <br>";
         echo"$grupo2 grupo222 <br>";
         echo"$accion2 accion222 <br>";*/
         if($accion==5)
         {


             $grupoobj->AlumnoGrupo($idalumno3, $grupo);
         }
     }
}

else
{
    $alumnos=0;
}

$grupoobj->gruposalumnos();



?>