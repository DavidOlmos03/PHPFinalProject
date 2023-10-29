<?php
  class Variable{
  	var $id, $nombre, $fechacreacion, $fkemailusuario;

  	function __construct($id,$nombre,$fechacreacion, $fkemailusuario){
  		$this->id = $id;
  		$this->resultado = $nombre;
		$this->fechacalculo = $fechacreacion;
		$this->fkidindicador = $fkemailusuario;
  	}

  	function setId($id){
  		$this->id = $id;
  	}

  	function getId(){
  		return $this->id;
  	} 

  	function setNombre($nombre){
  		$this->nombre = $nombre;
  	}

  	function getNombre(){
  		return $this->nombre;
  	} 
	
  	function setFechaCreacion($fechacreacion){
		$this->fechacreacion = $fechacreacion;
	}

	function getFechaCreacion(){
		return $this->fechacreacion;
	} 
	
	function setFkEmailUsuario($fkemailusuario){
		$this->fkemailusuario = $fkemailusuario;
	}

	function getFkEmailUsuario(){
		return $this->fkemailusuario;
	}    		
  }
?>