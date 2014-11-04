<?php
require('Usuario.php');

$alumno = new Usuario();

$alumno->createUsuario();
$alumno->readUsuarioG();
$alumno->readUsuarioS();
$alumno->updateUsuario();
$alumno->deleteUsuario();

?>