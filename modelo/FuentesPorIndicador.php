<?php
    class FuentesPorIndicador{
        var $fkIdFuente;
        var $fkIdIndicador;

        function __construct($fkIdIndicador,$fkIdFuente ){
            $this->fkIdFuente = $fkIdFuente ;
            $this->fkIdIndicador = $fkIdIndicador 	;
        }

        function setFkIdFuente($fkIdFuente ){
            $this->fkIdFuente = $fkIdFuente ;
        }

        function getFkIdFuente(){
            return $this->fkIdFuente ;
        }

        function setFkIdIndicador($fkIdIndicador ){
            $this->fkIdIndicador  = $fkIdIndicador ;
        }

        function getFkIdIndicador (){
            return $this->fkIdIndicador ;
        }
    }
?>