<?php

class Resultado {
    private $_idResult;
    private $_equipo1;
    private $_equipo2;
    private $_golesE1;
    private $_golesE2;
    
    public function __construct() {
        
    }

    public function getIdResult() {
        return $this->_idResult;
    }

    public function getEquipo1() {
        return $this->_equipo1;
    }

    public function getEquipo2() {
        return $this->_equipo2;
    }

    public function getGolesE1() {
        return $this->_golesE1;
    }

    public function getGolesE2() {
        return $this->_golesE2;
    }

    public function setIdResult($_idResult) {
        $this->_idResult = $_idResult;
    }

    public function setEquipo1($_equipo1) {
        $this->_equipo1 = $_equipo1;
    }

    public function setEquipo2($_equipo2) {
        $this->_equipo2 = $_equipo2;
    }

    public function setGolesE1($_golesE1) {
        $this->_golesE1 = $_golesE1;
    }

    public function setGolesE2(_$golesE2) {
        $this->_golesE2 = $_golesE2;
    }





}
