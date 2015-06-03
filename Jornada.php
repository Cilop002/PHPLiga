<?php

class Jornada {
    private $_idJornada;
    private $_fecha;
    private $_resultado1;
    private $_resultado2;
    private $_resultado3;
    private $_resultado4;
    private $_resultado5;

    public function __construct() {
        $this->bd=Conectar::conexion();
    }

    function getIdJornada() {
        return $this->_idJornada;
    }

    function getFecha() {
        return $this->_fecha;
    }

    function getResultado1() {
        return $this->_resultado1;
    }

    function getResultado2() {
        return $this->_resultado2;
    }

    function getResultado3() {
        return $this->_resultado3;
    }

    function getResultado4() {
        return $this->_resultado4;
    }

    function getResultado5() {
        return $this->_resultado5;
    }

    function setIdJornada($_idJornada) {
        $this->_idJornada = $_idJornada;
    }

    function setFecha($_fecha) {
        $this->_fecha = $_fecha;
    }

    function setResultado1($_resultado1) {
        $this->_resultado1 = $_resultado1;
    }

    function setResultado2($_resultado2) {
        $this->_resultado2 = $_resultado2;
    }

    function setResultado3($_resultado3) {
        $this->_resultado3 = $_resultado3;
    }

    function setResultado4($_resultado4) {
        $this->_resultado4 = $_resultado4;
    }

    function setResultado5($_resultado5) {
        $this->_resultado5 = $_resultado5;
    }
    public function mostrarDatos(){
		$consulta=$this->bd->query("SELECT * FROM jornada");
		while($filas=$consulta->fetch_assoc()){
   		$this->jornada[]=$filas;
   	}
           return $this->jornada;
     }
    public function agregarDatos($_idJornada, $_fecha, $_resultado1, $_resultado2, $_resultado3, $_resultado4, $_resultado5){
   		$consulta=$this->bd->query("INSERT INTO jornada VALUES ($_idJornada, $_fecha, $_resultado1, $_resultado2, $_resultado3, $_resultado4, $_resultado5);");
   		print("<script>alert('Datos insertados exitosamente.')</script>");
    }
    public function modificarDatos($_fecha, $_resultado1, $_resultado2, $_resultado3, $_resultado4, $_resultado5, $_idJornada){
   		$consulta=$this->bd->query("UPDATE jornada SET fecha='$_fecha', resultado1=$_resultado1, resultado2=$_resultado2, resultado3=$_resultado3, resultado4=$_resultado4, resultado5=$_resultado5 WHERE idEJornada=$_idJornada;");
   		print("<script>alert('Datos modificados exitosamente.')</script>");
    }
    public function eliminarDatos($_idJornada){
   	$consulta=$this->bd->query("DELETE FROM jornada WHERE idJornada=$_idJornada;");
   	print("<script>alert('Datos eliminados exitosamente.')</script>");
        
    }




}
