<?php
  class ResultadoIndicador{
  	var $id, $resultado, $fechacalculo, $fkidindicador;

  	function __construct($id,$resultado,$fechacalculo, $fkidindicador){
  		$this->id = $id;
  		$this->resultado = $resultado;
		$this->fechacalculo = $fechacalculo;
		$this->fkidindicador = $fkidindicador;
  	}

  	function setId($id){
  		$this->id = $id;
  	}

  	function getId(){
  		return $this->id;
  	} 

  	function setResultado($resultado){
  		$this->resultado = $resultado;
  	}

  	function getResultado(){
  		return $this->resultado;
  	} 
	
  	function setFechaCalculo($fechacalculo){
		$this->fechacalculo = $fechacalculo;
	}

	function getFechaCalculo(){
		return $this->fechacalculo;
	} 
	
	function setFkIdIndicador($fkidindicador){
		$this->fkidindicador = $fkidindicador;
	}

	function getFkIdIndicador(){
		return $this->fkidindicador;
	}    		
  }
?>