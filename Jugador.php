<?php

class Jugador {
    private $_idJugador;
    private $_nombre;
    private $_apellido;
    private $_edad;
    private $_nacionalidad;
    private $_posicion;
    private $_idEquipo;

    public function __construct() {

    }

    public function getIdJugador() {
        return $this->_idJugador;
    }

    public function getNombre() {
        return $this->_nombre;
    }

    public function getApellido() {
        return $this->_apellido;
    }

    public function getEdad() {
        return $this->_edad;
    }

    public function getNacionalidad() {
        return $this->_nacionalidad;
    }

    public function getPosicion() {
        return $this->_posicion;
    }

    public function getIdEquipo() {
        return $this->_idEquipo;
    }

    public function setIdJugador($_idJugador) {
        $this->_idJugador = $_idJugador;
    }

    public function setNombre($_nombre) {
        $this->_nombre = $_nombre;
    }

    public function setApellido($_apellido) {
        $this->_apellido = $_apellido;
    }

    public function setEdad($_edad) {
        $this->_edad = $_edad;
    }

    public function setNacionalidad($_nacionalidad) {
        $this->_nacionalidad = $_nacionalidad;
    }

    public function setPosicion($_posicion) {
        $this->_posicion = $_posicion;
    }

    public function setIdEquipo($_idEquipo) {
        $this->_idEquipo = $_idEquipo;
    }
    public function mostrarDatos(){
		$consulta=$this->bd->query("select * from jugador");
		while($filas=$consulta->fetch_assoc()){
   		$this->jugador[]=$filas;
   	}
           return $this->jugador;
     }
    public function agregarDatos($_idJugador,$_nombre,$_apelido,$_edad,$_nacionalidad,$_posicion,$_idEquipo){
   		$consulta=$this->bd->query("INSERT INTO jugador VALUES ($_idJugador,'$_nombre','$_apelido',$_edad,'$_nacionalidad','$_posicion',$_idEquipo);");
   		print("<script>alert('Datos insertados exitosamente.')</script>");
    }
    public function modificarDatos($_nombre,$_apelido,$_edad,$_nacionalidad,$_posicion,$_idEquipo,$_idJugador){
   		$consulta=$this->bd->query("UPDATE jugador SET nombre='$_nombre', apellido='$_apelido', edad=$_edad, nacionalidad='$_nacionalidad',posicion='$_posicion',idEquipo=$_idEquipo WHERE idJugador=$_idJugador;");
   		print("<script>alert('Datos modificados exitosamente.')</script>");
    }
    public function eliminarDatos($_idJugador){
   	$consulta=$this->bd->query("DELETE FROM jugador WHERE idJugador=$_idJugador;");
   	print("<script>alert('Datos eliminados exitosamente.')</script>");
    }

}
