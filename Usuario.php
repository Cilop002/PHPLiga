<?php

class Usuario {
    private $_userName;
    private $_pass;
    private $_tipo;
    private $_correo;
    
    public function __construct() {

    }
    
    function getUserName() {
        return $this->_userName;
    }

    function getPass() {
        return $this->_pass;
    }

    function getTipo() {
        return $this->_tipo;
    }

    function getCorreo() {
        return $this->_correo;
    }

    function setUserName($_userName) {
        $this->_userName = $_userName;
    }

    function setPass($_pass) {
        $this->_pass = $_pass;
    }

    function setTipo($_tipo) {
        $this->_tipo = $_tipo;
    }

    function setCorreo($_correo) {
        $this->_correo = $_correo;
    }

    
    
}
