<?php
    class ControlNumeral{
        var $objNumeral;

        function __construct($objNumeral){
            $this->objNumeral = $objNumeral;
        }

        function listar(){
            $comandoSql = "SELECT id, descripcion FROM numeral";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloNumeral = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objNumeral = new Numeral("", "");
                    $objNumeral->setId($row['id']);
                    $objNumeral->setDescripcion($row['descripcion']);
                    
                    $arregloNumeral[$i] = $objNumeral;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloNumeral;
        }
    }
?>