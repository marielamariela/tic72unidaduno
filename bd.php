<?php
$db_name="usuario";
$db_server="localhost";
$db_user="root";
$db_pass="";
$db_connection=mysql_connect($db_server, $db_user, $db_pass) or die ("error de conexion");
mysql_select_db($db_name, $db_connection) or die ("error al conectar");
mysql_query("SET NAMES utf8");
?>