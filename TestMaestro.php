<?php
require('Maestro.php');
require('db.php');

$maestro = new Usuario();
$maestro->createUsuario();
$maestro->readUsuarioG();
$maestro->readUsuarioS();
$maestro->updateUsuario();
$maestro->deleteUsuario();



?>