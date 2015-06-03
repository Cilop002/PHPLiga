<?php
include 'Conexion.php';
require_once 'Usuario.php';
class DAOUsuario {
    var $con;    
    public function __construct() {
        
    }
    public function insertar($obj){
        $c = conexion();
        $user = $obj -> getUserName();
        $pass = $obj -> getPass();
        $tipo = $obj -> getTipo();
        $correo = $obj -> getCorreo();
               
        $sql = "insert into usuario values ('$user','$pass',$tipo,'$correo')";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Usuario creado correctamente!");</script>';
        }
        
        mysqli_close($c);
        
        }
    public function eliminar($obj){
        $c = conexion();
        $user = $obj -> getUserName();
        $sql = "delete from usuario where userName = $user";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Usuario eliminado correctamente!");</script>';
        }
        mysqli_close($c);
    }
    public function modificar($obj){
        $c = conexion();
        $user = $obj -> getUserName();
        $pass = $obj -> getPass();
        $tipo = $obj -> getTipo();
        $correo = $obj -> getCorreo();
        
        $sql = "update usuario set pass = '$pass', tipo = $tipo, correo = '$correo' where userName = '$user'";
        if (!$c -> query($sql)){
            print "Error al ejecutar la consulta";
        }else{
            echo '<script language="javascript">alert("Usuario modificado correctamente!");</script>';
        }
        
        mysqli_close($c);
    }
    public function listar(){
		$c = conexion();
		$sql="select * from usuario";
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
		$sql="select * from usuario where userName like '%'$obj'%'";
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
