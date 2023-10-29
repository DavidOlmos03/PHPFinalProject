<?php
  class Articulo{
  	var $id, $nombre;

      function __construct($id, $nombre){
        $this->id = $id;
        $this->nombre = $nombre;
      
    }
  /*	function __construct($id,$nombre,$descripcion,$fkIdSeccion,$fkIdSubseccion){
  		$this->id = $id;
  		$this->nombre = $nombre;
		$this-$descripcion = $descripcion;
        $this-$fkIdSeccion = $fkIdSeccion;
        $this-$fkIdSubseccion = $fkIdSubseccion;
  	}*/

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
	
/*	function setDescripcion($descripcion){
		$this-$descripcion = $descripcion;
	}

	function getDescripcion(){
		return $this-$descripcion;
	}    	
    function setFkIdSeccion($fkIdSeccion){
		$this-$fkIdSeccion = $fkIdSeccion;
	}

	function getFkIdSeccion(){
		return $this-$fkIdSeccion;
	}  
    function setFkIdSubseccion($fkIdSubseccion){
		$this-$fkIdSubseccion = $fkIdSubseccion;
	}

	function getFkIdSubseccion(){
		return $this-$fkIdSubseccion;
	}  	*/
  }
?>