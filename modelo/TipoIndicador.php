<?php
  class TipoIndicador{
	var $id,$nombre;
	

  	function __construct($id,$nombre){
		$this->id = $id;
  		$this->nombre = $nombre;
  	}

  	function setNombre($Nombre){
  		$this->nombre = $Nombre;
  	}

  	function getNombre(){
  		return $this->nombre;
  	} 
 
  	function setId($id){
  		$this->id = $id;
  	}

  	function getId(){
  		return $this->id;
  	} 

  }

?>