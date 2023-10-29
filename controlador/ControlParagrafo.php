<?php
    class ControlParagrafo{
        var $objParagrafo;

        function __construct($objParagrafo){
            $this->objParagrafo = $objParagrafo;
        }

        function listar(){
            $comandoSql = "SELECT id, descripcion FROM paragrafo";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloParagrafo = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objParagrafo = new Paragrafo("", "");
                    $objParagrafo->setId($row['id']);
                    $objParagrafo->setDescripcion($row['descripcion']);
                    
                    $arregloParagrafo[$i] = $objParagrafo;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloParagrafo;
        }
    }
?>