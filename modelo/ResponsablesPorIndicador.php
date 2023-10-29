<?php
    class ResponsablesPorIndicador{
        var $fkidresponsable;
        var $fkidindicador ;
        var $fechaasignacion;

        function __construct($fkidresponsable, $fkidindicador){
            $this->fkidresponsable = $fkidresponsable;
            $this->fkidindicador 	 = $fkidindicador ;
        }

        function setfkidresponsable($fkidresponsable){
            $this->fkidresponsable = $fkidresponsable;
        }

        function getfkidresponsable(){
            return $this->fkidresponsable;
        }

        function setfkidindicador ($fkidindicador){
            $this->fkidindicador  = $fkidindicador ;
        }

        function getfkidindicador(){
            return $this->fkidindicador ;
        }

        function setfechaasignacion ($fechaasignacion){
            $this->fkidindicador  = $fechaasignacion;
        }

        function getfechaasignacion (){
            return $this->fechaasignacion;
        }
    }
?>