<?php
include 'Conexion.php';
require_once 'Jugador.php';

class DAOJugador {
    var $con;
    public function __construct() {
        
    }
    public function insertar($obj){
        $c = conexion();
        $id = $obj -> getIdJugador();
        $nombre = $obj -> getNombre();
        $apellido = $obj -> getApellido();
        $edad = $obj -> getEdad();
        $nacionalidad = $obj -> getNacionalidad();
        $posicion = $obj -> getPosicion();
        $idEquipo = $obj -> getIdEquipo();
        $sql = "insert into jugador values ('$id','$nombre','$apellido','$edad','$nacionalidad','$posicion','$idEquipo')";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Jugador insertado correctamente!");</script>';
        }
        mysqli_close($c);
        }
    public function eliminar($obj){
        $c = conexion();
        $id = $obj -> getIdJugador();
        $sql = "delete from jugador where idJugador = $id";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Jugador eliminado correctamente!");</script>';
        }
        mysqli_close($c);
    }
    public function modificar($obj){
        $c = conexion();
        $id = $obj -> getIdJugador();
        $nombre = $obj -> getNombre();
        $apellido = $obj -> getApellido();
        $edad = $obj -> getEdad();
        $nacionalidad = $obj -> getNacionalidad();
        $posicion = $obj -> getPosicion();
        $idEquipo = $obj -> getIdEquipo();
        $sql = "update jugador set nombre = '$nombre', apellido = '$apellido', edad = '$edad', nacionalidad = '$nacionalidad', posicion = '$posicion', idEquipo = '$idEquipo' where idJugador = '$id' ";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Jugador modificado correctamente!");</script>';
        }
        mysqli_close($c);
    }
    public function listar(){
		$c = conexion();
		$sql="select * from jugador";
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
		$sql="select * from jugador where nombre like '%'$obj'%'";
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
