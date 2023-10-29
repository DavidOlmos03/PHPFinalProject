<?php
  class VariablesPorIndicador{
  	var $id, $fkIdVariable , $fkEmailUsuario, $fkIdIndicador, $dato, $fechaDato;

  	function __construct($fkIdIndicador,$id, $fkIdVariable , $fkEmailUsuario, $dato, $fechaDato){
  		$this->id = $id;
  		$this->fkIdVariable  = $fkIdVariable ;
		$this->fkEmailUsuario = $fkEmailUsuario;
		$this->fkIdIndicador = $fkIdIndicador;
		$this->dato = $dato;
		$this->fechaDato = $fechaDato;
  	}

  	function setId($id){
  		$this->id = $id;
  	}

  	function getId(){
  		return $this->id;
  	} 

  	function setFkIdVariable ($fkIdVariable ){
  		$this->fkIdVariable  = $fkIdVariable ;
  	}

  	function getFkIdVariable (){
  		return $this->fkIdVariable ;
  	} 
	
  	function setFkEmailUsuario($fkEmailUsuario){
		$this->fkEmailUsuario = $fkEmailUsuario;
	}

	function getFkEmailUsuario(){
		return $this->fkEmailUsuario;
	} 
	
	function setFkIdIndicador($fkIdIndicador){
		$this->fkIdIndicador = $fkIdIndicador;
	}

	function getFkIdIndicador(){
		return $this->fkIdIndicador;
	}  
	
	function setDato($dato){
		$this->dato = $dato;
	}

	function getDato(){
		return $this->dato;
	}  

	function setFechaDato($fechaDato){
		$this->fechaDato = $fechaDato;
	}

	function getFechaDato(){
		return $this->fechaDato;
	}  
  }
?>