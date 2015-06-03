<?php

require_once 'Conexion.php';
require_once 'Jornada.php';

class DAOJornada{
	var $con;
	public function DAOEmpleado(){
	}

	public function insertar($obj){
		$c = conectar();
		$idJornada = $obj -> getIdJornada();
		$fecha = $obj -> getFecha();
		$resultado1 = $obj -> getResultado1();
		$resultado2 = $obj -> getResultado2();
                $resultado3 = $obj -> getResultado3();
                $resultado4 = $obj -> getResultado4();
                $resultado5 = $obj -> getResultado5();

		$sql="insert into jornada values($idJornada, '$fecha',$resultado1, $resultado2, $resultado3, $resultado4),$resultado5";
		if(!$c->query($sql)){
                    print "Error al ingresar los datos";// se debe mostrar el error
		}else{
                    echo '<script language="javascript">alert("Ingresado correctamente");</script>';
		}
		mysqli_close($c);
	}

	public function eliminar($obj){
		$c=conectar();
		$id=$obj->getIdJornada();
		$sql="delete from jornada where idJornada= $id";
		if(!$c->query($sql)){
                    print "Error al eliminar los datos";
		}else{
                    echo '<script language="javascript">alert("Eliminado correctamente");</script>';
		}
		mysqli_close($c);
	}

	public function modificar($obj){
		$c=conectar();
		$id = $obj -> getIdJornada();
		$fecha = $obj -> getFecha();
		$resultado1 = $obj -> getResultado1();
		$resultado2 = $obj -> getResultado2();
                $resultado3 = $obj -> getResultado3();
                $resultado4 = $obj -> getResultado4();
                $resultado5 = $obj -> getResultado5();
		$sql="update jornada set fecha='$fecha',resultado1=$resultado1,resultado2=$resultado2,resultado3=$resultado3, resultado4=$resultado4, resultado5=$resultado5 where idJornada=$id";
		if(!$c->query($sql)){
                    print "Error al modificar los datos";
		}else{
                    echo '<script language="javascript">alert("Modificado correctamente");</script>';
		}
		mysqli_close($c);
	}

	public function listar(){
		$c = conectar();
		$sql="select * from jornada";
		$resultado = $c->query($sql);
		print "<table>";
		$ncampos = mysqli_num_fields($resultado);
		print "<tr>";
		for($i=0; $i<$ncampos;$i++){
		  print "<td><b><font color='black'>". mysqli_fetch_field_direct($resultado, $i)->name."</font></b></td>";
		}
		print "</tr>";
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
		$c=conectar();
		$id=$obj->getIdJornada();
		$sql="select * from jornada where idJornada= $id";
		$resultado = $c->query($sql);
		if(!$c->query($sql)){
				print "Error al realizar la busqueda";
		}else{
			echo "<center><h3><strong>Resultado de la busqueda</strong><h3></center>";
					print "<table>";
					$ncampos = mysqli_num_fields($resultado);
					print "<tr>";
					for($i=0; $i<$ncampos;$i++){
					  print "<td><b><font color='black'>". mysqli_fetch_field_direct($resultado, $i)->name."</font></b></td>";
					}
					print "</tr>";
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
?>
