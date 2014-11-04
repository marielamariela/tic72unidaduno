<?php
include('header.php');
include('bd.php');

$idmateria=$_REQUEST['idmateria'];
$sql="delete from materia where id_materia=$idmateria";
$consulta=mysql_query($sql) or die ("error $sql");
echo"Materia con clave $idmateria eliminada correctamente";

?>