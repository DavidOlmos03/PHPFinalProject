<?php
  class Indicador{
  	var $id, $codigo, $nombre, $objetivo, $alcance, $formula, 
	  $fkIdTipoIndicador, $fkIdUnidadMedicion,$meta, $fkIdSentido,
	  $fkIdArticulo,$fkIdLiteral,$fkIdNumeral,$fkIdParagrafo,$fkIdFrecuencia;

  	function __construct($id, $codigo, $nombre, $objetivo, $alcance, $formula, 
	  $fkIdTipoIndicador, $fkIdUnidadMedicion,$meta, $fkIdSentido,$fkIdFrecuencia,
	  $fkIdArticulo,$fkIdLiteral,$fkIdNumeral,$fkIdParagrafo){
  		$this->id = $id;
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->objetivo = $objetivo;
		$this->alcance = $alcance;
		$this->formula = $formula;
		$this->fkIdTipoIndicador = $fkIdTipoIndicador;
		$this->fkIdUnidadMedicion = $fkIdUnidadMedicion;
		$this->meta = $meta;
  		$this->fkIdSentido   = $fkIdSentido;
		$this->fkIdFrecuencia = $fkIdFrecuencia;
		$this->fkIdArticulo = $fkIdArticulo;
		$this->fkIdLiteral = $fkIdLiteral;
		$this->fkIdNumeral = $fkIdNumeral;
		$this->fkIdParagrafo = $fkIdParagrafo;
  	}

  	function setId($id){
  		$this->id = $id;
  	}

  	function getId(){
  		return $this->id;
  	} 

	function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	function getCodigo(){
		return $this->codigo;
	}  

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function getNombre(){
		return $this->nombre;
	}  

	function setObjetivo($objetivo){
		$this->objetivo = $objetivo;
	}

	function getObjetivo(){
		return $this->objetivo;
	}  
	function setAlcance($alcance){
		$this->alcance = $alcance;
	}

	function getAlcance(){
		return $this->alcance;
	}  
	
	function setFormula($formula){
		$this->nombre = $formula;
	}

	function getFormula(){
		return $this->formula;
	}  
	function setFkIdTipoIndicador($fkIdTipoIndicador){
		$this->fkIdTipoIndicador = $fkIdTipoIndicador;
	}

	function getFkIdTipoIndicador(){
		return $this->fkIdTipoIndicador;
	} 

  	public function getFkIdUnidadMedicion() {
        return $this->fkIdUnidadMedicion;
    }

    function setFkIdUnidadMedicion($fkIdUnidadMedicion) {
        $this->fkIdUnidadMedicion = $fkIdUnidadMedicion;
    }

    function getMeta() {
        return $this->meta;
    }

    function setMeta($meta) {
        $this->meta = $meta;
    }

    function getFkIdSentido() {
        return $this->fkIdSentido;
    }

    function setFkIdSentido($fkIdSentido) {
        $this->fkIdSentido = $fkIdSentido;
    }

    function getFkIdFrecuencia() {
        return $this->fkIdFrecuencia;
    }

    function setFkIdFrecuencia($fkIdFrecuencia) {
        $this->fkIdFrecuencia = $fkIdFrecuencia;
    }

    function getFkIdArticulo() {
        return $this->fkIdArticulo;
    }

    function setFkIdArticulo($fkIdArticulo) {
        $this->fkIdArticulo = $fkIdArticulo;
    }

    function getFkIdLiteral() {
        return $this->fkIdLiteral;
    }

    function setFkIdLiteral($fkIdLiteral) {
        $this->fkIdLiteral = $fkIdLiteral;
    }

    function getFkIdNumeral() {
        return $this->fkIdNumeral;
    }

    function setFkIdNumeral($fkIdNumeral) {
        $this->fkIdNumeral = $fkIdNumeral;
    }

    function getFkIdParagrafo() {
        return $this->fkIdParagrafo;
    }

    function setFkIdParagrafo($fkIdParagrafo) {
        $this->fkIdParagrafo = $fkIdParagrafo;
    } 
  }
?>