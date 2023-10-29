<?php
  class Actor{
  	var $id, $nombre, $fkidtipoactor;

  	function __construct($id,$nombre,$fkidtipoactor){
  		$this->id = $id;
  		$this->nombre = $nombre;
		$this->fkidtipoactor = $fkidtipoactor;
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
	
	function setFkIdTipoActor($fkidtipoactor){
		$this->fkidtipoactor = $fkidtipoactor;
	}

	function getFkIdTipoActor(){
		return $this->fkidtipoactor;
	}    		
  }
?>