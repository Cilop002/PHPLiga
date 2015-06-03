<?php
include 'Conexion.php';
require_once 'Equipo.php';

class DAOEquipo {
    var $con;
    
    public function __construct() {
        
    }
    public function insertar($obj){
        $c = conexion();
        $id = $obj -> getIdEquipo();
        $name = $obj -> getNombre();
        $pj = $obj -> getPJ();
        $pg = $obj -> getPG();
        $pe = $obj -> getPE();
        $pp = $obj -> getPP();
        $gf = $obj -> getGF();
        $gc = $obj -> getGC();
        $dg = $obj -> getDG();
        $points = $obj -> getPuntos();
        
        $sql = "insert into equipo values ('$id','$name','$pj','$pg','$pe','$pp','$gf','$gc','$dg','$points')";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Equipo insertado correctamente!");</script>';
        }
        
        mysqli_close($c);
        
        }
    public function eliminar($obj){
        $c = conexion();
        $id = $obj -> getIdEquipo();
        $sql = "delete from equipo where idEquipo = $id";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Equipo eliminado correctamente!");</script>';
        }
        mysqli_close($c);
    }
    public function modificar($obj){
        $c = conexion();
        $id = $obj -> getIdEquipo();
        $name = $obj -> getNombre();
        $pj = $obj -> getPJ();
        $pg = $obj -> getPG();
        $pe = $obj -> getPE();
        $pp = $obj -> getPP();
        $gf = $obj -> getGF();
        $gc = $obj -> getGC();
        $dg = $obj -> getDG();
        $points = $obj -> getPuntos();
        
        $sql = "update equipo set nombre = '$name', PJ = '$pj', PG = '$pg', PE = '$pe', PP = '$pp', GF = '$gf', GC = '$gc', DG = '$dg', puntos = '$points' where idEquipo = '$id' ";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Equipo modificado correctamente!");</script>';
        }
        
        mysqli_close($c);
    }
    public function listar(){
		$c = conexion();
		$sql="select * from equipo";
		$resultado = $c->query($sql);
		//mostrar resultado bonito
		print "<table>";
		$ncampos = mysqli_num_fields($resultado);
		//imprime encabezados de la consulta
		print "<tr>";
		for($i=0; $i<$ncampos;$i++){
		  print "<td><b><font color='black'>". mysqli_fetch_field_direct($resultado, $i)->name."</font></b></td>";
		}
		print "</tr>";
		//ahora todo el contenido de la consulta
		print "<tr>";
		for($i=0; $i<$ncampos;$i++){
		 	while($fila=mysqli_fetch_row($resultado)){  //mientras hayan registros
			 	print "<tr>";
						for ($j=0; $j<$ncampos; $j++)
						{
							print "<td>". $fila[$j] . " </td> ";
						}
				print "</tr>";
		 	}
		}
		print "</tr>";
	}
        public function buscar($obj){
		$c=conexion();
		$sql="select * from equipo where nombre like '%'$obj'%'";
		$resultado = $c->query($sql);
		if(!$c->query($sql)){
				print "Error al ejecutar la sql: ";//.$c->mysql_error();
		}else{
			echo "<center><h3><strong>Resultado de la busqueda</strong><h3></center>";
                            print "<table>";
                            $ncampos = mysqli_num_fields($resultado);
                            //imprime encabezados de la consulta
                            print "<tr>";
                            for($i=0; $i<$ncampos;$i++){
                              print "<td><b><font color='black'>". mysqli_fetch_field_direct($resultado, $i)->name."</font></b></td>";
                            }
                            print "</tr>";
                            //ahora todo el contenido de la consulta
                            print "<tr>";
                            for($i=0; $i<$ncampos;$i++){
                             	while($fila=mysqli_fetch_row($resultado)){  //mientras hayan registros
                            	 	print "<tr>";
                                	for ($j=0; $j<$ncampos; $j++)
                                	{
                                            print "<td>". $fila[$j] . " </td> ";
					}
					print "</tr>";
                                    }
				}
					print "</tr>";
		     }
		mysqli_close($c);
	}
}
