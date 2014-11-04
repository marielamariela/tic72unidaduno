<?php
require('bd.php');
class Usuario {

    private $Id;
    private $Nombre;
    private $ApellidoPaterno;
    private $ApellidoMaterno;
    private $Telefono;
    private $Calle;
    private $NumeroExterior;
    private $NumeroInterior;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contrasena;
    private $Nivel;
    private $Estatus;

    public function createUsuario($Nombre, $ApellidoPaterno, $ApellidoMaterno, $Nivel)
{

  $insert01= " insert into usuario(Nombre, ApellidoPaterno, ApellidoMaterno, Nivel)
values(' $Nombre', '$ApellidoPaterno','$ApellidoMaterno',$Nivel)";
 mysql_query($insert01) or die ("error insert");
    //echo"$insert01";


       // echo"<br>createUsuario";
}



    public function readUsuarioG(){
        echo"<br>readUsuarioG";
       $sql01="select * from usuario ";
        $result01=mysql_query($sql01) or die ("error sql01");
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";

        echo"<tr><th colspan=5 align=center><strong>Lista de usuarios</strong></th></tr>";
        echo"<tr><th>id</th><th>Nombre</th><th>Apellido p</th><th>Apellido m</th>";




        while($field=mysql_fetch_array($result01)){
            $this->Id = $field['Id'];
            $this->Nombre = $field['Nombre'];
            $this->ApellidoPaterno =utf8_decode($field['ApellidoPaterno']);
            $this->ApellidoMaterno =utf8_decode($field['ApellidoMaterno']);
            $this->Nivel = $field['Nivel'];
           // echo"<br>Id:".$this->Id;
            //echo"<br>Nombre:".$this->Nombre;
            //echo"<br>ApellidoPaterno:".$this->ApellidoPaterno;
            //echo"<br>ApellidoMaterno:".$this->ApellidoMaterno;
            //echo"<br>Nivel:".$this->Nivel;
            switch($this->Nivel){
                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                $type ="Maestro";
                break;
                case 3:
                    $type ="Alumno";
                    break;
            }
           echo"<tr><td>$this->Id</td><td>$this->Nombre</td>
           <td>$this->ApellidoPaterno</td><td>$this->ApellidoMaterno</td>
           </tr>";

            }

        echo"</table>";
        echo"</div>";
    }





    public function readUsuarioS($id){
        echo"<br>readUsuarioS";
        $sql01="select * from usuario where Id= $id ";
        $result01=mysql_query($sql01) or die ("error sql01");
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";

        echo"<tr><th colspan=''>Lista de usuarios</th></tr>";
        echo"<tr><th><center>id</center></th><th><center>Nombre</center></th><th><center>Apellido Paterno</center></th>
        <th><center>Apellido Materno</center></th></tr>";



        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        while($field=mysql_fetch_array($result01))
        {
            $this->Id = $field['Id'];
            $this->Nombre = $field['Nombre'];
            $this->ApellidoPaterno =utf8_decode($field['ApellidoPaterno']);
            $this->ApellidoMaterno =utf8_decode($field['ApellidoMaterno']);
            $this->Nivel = $field['Nivel'];
            //echo"<br>Id:".$this->Id;
            //echo"<br>Nombre:".$this->Nombre;
            //echo"<br>ApellidoPaterno:".$this->ApellidoPaterno;
            //echo"<br>ApellidoMaterno:".$this->ApellidoMaterno;
            //echo"<br>Nivel:".$this->Nivel;
            switch($this->Nivel){
                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                    $type ="Maestro";
                    break;
                case 3:
                    $type ="Alumno";
                    break;
            }
            echo"<tr><th><center>$this->Id</center></th><th><center>$this->Nombre</center></th>
           <th><center>$this->ApellidoPaterno</center></th><th><center>$this->ApellidoMaterno</center></th>
           </tr>";

        }
        echo"</table>";
        echo"</div>";

        }


    public function updateUsuario($id, $nombre, $apellidop, $apellidom, $Nivel){
        $update01= "Update usuario set Nombre='$nombre', ApellidoPaterno='$apellidop', ApellidoMaterno='$apellidom',
        Nivel='$Nivel' where Id= '$id'";
        //echo"$update01";
        $execute01=mysql_query($update01) or die ("error $update01".mysql_error());








     //   echo"<br>updateUsuario";
    }

    public function deleteUsuario($id){

        $delete01="Delete from  usuario  where Id=$id ";
        $execute01=mysql_query($delete01) or die ("error $delete01".mysql_error());
    }
}


?>