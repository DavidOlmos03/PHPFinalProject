<?php
    class RepresenVisualPorIndicador{
        var $fkIdIndicador;
        var $fkIdRepresenVisual	;

        function __construct($fkIdIndicador, $fkIdRepresenVisual){
            $this->fkIdIndicador = $fkIdIndicador;
            $this->fkIdRepresenVisual	 = $fkIdRepresenVisual	;
        }

        function setFkIdIndicador($fkIdIndicador){
            $this->fkIdIndicador = $fkIdIndicador;
        }

        function getFkIdIndicador(){
            return $this->fkIdIndicador;
        }

        function setFkIdRepresenVisual	($fkIdRepresenVisual){
            $this->fkIdRepresenVisual	 = $fkIdRepresenVisual;
        }

        function getFkIdRepresenVisual	(){
            return $this->fkIdRepresenVisual;
        }
    }
?>