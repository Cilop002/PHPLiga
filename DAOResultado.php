<?php
class DAOResultado {
    var $con;
    
    public function __construct() {
        
    }
    public function insertar($obj){
        $c = conexion();
        $idR = $obj -> getIdResult();
        $e1 = $obj -> getEquipo1();
        $e2 = $obj -> getEquipo2();
        $ge1 = $obj -> getGolesE1();
        $ge2 = $obj -> getGolesE2();
        
        $sql = "insert into resultado values ('$idR','$e1','$e2','$ge1','$ge2')";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Resultado insertado correctamente!");</script>';
        }
        
        mysqli_close($c);
        
        }
    public function eliminar($obj){
        $c = Conexion::conexion();
        $idR = $obj -> getIdResult();
        $sql = "delete from resultado where idR = $idR";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Resultado eliminado correctamente!");</script>';
        }
        mysqli_close($c);
    }
    public function modificar($obj){
       $c = conexion();
        $idR = $obj -> getIdResult();
        $e1 = $obj -> getEquipo1();
        $e2 = $obj -> getEquipo2();
        $ge1 = $obj -> getGolesE1();
        $ge2 = $obj -> getGolesE2();
        
        $sql = "update resultado values ('$idR','$e1','$e2','$ge1','$ge2')";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Resultado insertado correctamente!");</script>';
        }
        
        mysqli_close($c);
    }
    public function listar(){
		$c = conectar();
		$sql="select * from resultado";
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
		$c=conectar();
		$sql="select * from resultado where idResult like '%'$obj'%'";
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
