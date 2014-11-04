<?php

require('bd.php');
class Materia {
 private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;


    public function createMateria(){
        echo"<br>create materia";

    }

    public function seleccionaMaestro(){
      echo"<div class=table-responsive>";
        echo"<form action=ajax.php method=Post name=maestro>";
        echo"<center><table class=\"table-striped\">";
       $sql02="Select * from usuario";
       $result02=mysql_query($sql02) or die ("error $sql02");
        $cuantos=mysql_num_rows($result02) or die ("error al contar");
//echo"$cuantos";
        echo"<tr><td align=center>Seleccione el maestro:<br><br><br><select  name='id_maestro' >";

        for ($y=0; $y<$cuantos; $y++){

            $id_maestro = mysql_result($result02, $y ,'Id');
            $Nombre = mysql_result($result02, $y ,'Nombre');
            $APaterno = mysql_result($result02, $y ,'ApellidoPaterno');
            $AMaterno = mysql_result($result02, $y,'ApellidoMaterno');


                echo"<option value='$id_maestro'>$Nombre.$APaterno.$AMaterno</option>";
        }

        echo"</select></td></tr>";
        echo"<tr><td colspan=2 align=center><br><br><br>
             <input type=submit id=submit value=Seleccionar></td></tr>";
        echo"</table></center>";
    echo"</form>";
        echo"</div>";

    }
    public function materiasAsignadas($id_maestro){
        echo"<div class=table-responsive>";
      //  echo"<form action=ajax.php method=Post name=maestro>";

        $sql05="SELECT  mm.*, m.*, count(*) as total FROM maestro_materia AS mm, materia AS m WHERE mm.id_materia=m.id_materia AND mm.id_maestro= $id_maestro";
        $result05=mysql_query($sql05) or die ("error $sql05".mysql_error());
        $total=mysql_result($result05, 0, 'total');
        $cuantos5=mysql_num_rows($result05) or die ("error al contar2 $sql05");
if( $total<=0 ){
echo"sin materias";
}

        else{
 $sql06="SELECT  mm.*, m.* FROM maestro_materia AS mm, materia AS m WHERE mm.id_materia=m.id_materia AND mm.id_maestro= $id_maestro";
            $result06=mysql_query($sql06) or die ("error $sql06".mysql_error());
            $cuantos5=mysql_num_rows($result06);


        echo"<center><table border=1 class=\"table-striped\">
<form action=TestMateria.php method=GET name=eliminar>
<tr><td colspan=3 align=center><strong>Materias</br></strong></td></tr>
<tr><td>Clave</br></td><td>Materias</td></br></td><td>Borrar</br></td></tr>";
        for ($y=0; $y<$cuantos5; $y++){

            $idmateria = mysql_result($result06, $y ,'id_materia');
            $idmaestro2 = mysql_result($result06, $y ,'id_maestro');
            $materia = mysql_result($result06, $y ,'materia');


        echo"<tr><td>$idmateria</td><td align=center> $materia</td>
        <td align=center><input type=submit value=Borrar></td></tr>
      ";
        }
        echo"</table></center>";
        echo"<input type=hidden name=materia id=materia value=$idmateria>
         <input type=hidden name=maestro id=maestro value=$id_maestro>
         <input type=hidden name=accion id=accion value=3>";
        echo"</form>";
        }
    echo"</div>";

}

    public function datosMaestro($id_maestro){
        $sql04= "select * from usuario where Id=$id_maestro";
        $result04=mysql_query($sql04) or die ("error en $sql04");
        $existe=mysql_num_rows($result04);
        if ($existe>0){
            $id= $id_maestro;
            $Ap=mysql_result($result04, 0, 'ApellidoPaterno');
            $Am=mysql_result($result04, 0, 'ApellidoMaterno');
            $Nom=mysql_result($result04, 0, 'Nombre');

            echo"<center><table  border=1><tr><td colspan=5 align=center><strong>Maestro seleccionado</strong></td></tr><tr><td>No.</td>
            <td align=center>Apellido Paterno</td><td  align=center>Apellido Materno</td><td  align=center>Nombre</td></tr>
            <tr><td  align=center>$id</td><td  align=center> $Ap</Td><td  align=center> $Am</td>
            <td  align=center>$Nom</td></tr></table></center>";
        }




    }

    public function asignarMateriaMaestro($id_maestro){
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<form action =TestMateria.php method=POST  id=materias>";
        echo"<tr><td colspan=2 align=center><strong>Asignar nuevas materias</strong></td></tr>";
        echo"<tr><td>Materia</td><td><select id=materia name=materia>";
        $sql04= "select * from materia where  estatus=1 order by materia asc";
        $result04=mysql_query($sql04) or die ("error en $sql04");
   while($field = mysql_fetch_array($result04)){
       $idmateria= $field['id_materia'];
       $opcion=utf8_decode($field['materia']);
       $sql05= "select * from maestro_materia where id_maestro=$id_maestro and id_materia=$idmateria";
       $result05=mysql_query($sql05) or die ("error en $sql05");
       $existe=mysql_num_rows($result05);
       if ($existe>0)
       {
           echo"<option value=0> No disponible $opcion</option>";
       }
       else
       {
           echo"<option value=$idmateria> $opcion</option>";
       }


   }
        echo"</select></td></tr>";

        echo"<input type=hidden id=accion name=accion value=1>";

        echo"<input type=hidden id=maestro name=maestro value=$id_maestro>";
        echo"<tr><td colspna=2 align=center><input type=submit value=Agregar></td></tr>";
        echo"</form></table></div>";


    }

    public function createMaestroMateria($id, $id_materia)
    {
           $sql04= "insert into maestro_materia (id_maestro, id_materia) values ($id, $id_materia)";
        $result04=mysql_query($sql04) or die ("error en $sql04");
//echo"$sql04  sql04";
    }

    public function deleteMaestroMateria($id_maestro, $id_materia)
    {
        $sql04= "delete from maestro_materia where id_maestro=$id_maestro and  id_materia=$id_materia";
        $result04=mysql_query($sql04) or die ("error en $sql04");
        //echo"$sql04  sql04";
    }




}
?>
