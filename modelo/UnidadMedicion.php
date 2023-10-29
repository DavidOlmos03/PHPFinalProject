<?php
  class UnidadMedicion{
	var $id,$descripcion;
	

  	function __construct($id,$descripcion){
		$this->id = $id;
  		$this->descripcion = $descripcion;
  	}

  	function setDescripcion($Descripcion){
  		$this->descripcion = $Descripcion;
  	}

  	function getDescripcion(){
  		return $this->descripcion;
  	} 
 
  	function setId($id){
  		$this->id = $id;
  	}

  	function getId(){
  		return $this->id;
  	} 

  }

?>