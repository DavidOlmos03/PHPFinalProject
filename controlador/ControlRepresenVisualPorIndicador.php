<?php
class ControlRepresenVisualPorIndicador
{
    var $objRepresenVisualPorIndicador;

    function __construct($objRepresenVisualPorIndicador)
    {
        $this->objRepresenVisualPorIndicador = $objRepresenVisualPorIndicador;
    }

    function guardar()
    {
        $fkIdIndicador = $this->objRepresenVisualPorIndicador->getfkIdIndicador();
        $fkIdRepresenVisual = $this->objRepresenVisualPorIndicador->getfkIdRepresenVisual();
        $comando = "insert into represenvisualporindicador(fkidindicador,fkidrepresenvisual) values('$fkIdIndicador',$fkIdRepresenVisual)";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
        $objControlConexion->ejecutarComandoSql($comando);
        $objControlConexion->cerrarBd();
    }

    function listarRepresenVisualPorIndicador($fkIdIndicador)
    {
        $comandoSql = "SELECT represenvisualporindicador.fkidrepresenvisual,represenvisual.nombre 
            FROM represenvisualporindicador INNER JOIN represenvisual ON represenvisual.fkidrepresenvisual = represenvisual.id
            WHERE fkidindicador = '$fkIdIndicador'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloRepresenVisual = array();
            $i = 0;
            while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $objRepresenVisual = new represenVisual(0, "");
                $objRepresenVisual->setId($row['id']);
                $objRepresenVisual->setNombre($row['nombre']);
                $arregloRepresenVisual[$i] = $objRepresenVisual;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloRepresenVisual;
    }
}
?>