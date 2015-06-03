<?php

function conexion(){
		$conexion = new mysqli("localhost","root","","liga");
		$conexion->query("SET NAMES 'utf8'");
		return $conexion;
	}
