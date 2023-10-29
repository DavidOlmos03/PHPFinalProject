<?php
class ControlResponsablesPorIndicador
{
    var $objResponsablesPorIndicador;

    function __construct($objResponsablesPorIndicador)
    {
        $this->objResponsablesPorIndicador = $objResponsablesPorIndicador;
    }

    function guardar()
    {
        $fkIdResponsable = $this->objResponsablesPorIndicador->getfkidresponsable();
        $fkIdIndicador = $this->objResponsablesPorIndicador->getfkidindicador();
        $comando = "insert into ResponsablesPorIndicador(fkidresponsable,fkidindicador) values('$fkIdResponsable',$fkIdIndicador)";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
        $objControlConexion->ejecutarComandoSql($comando);
        $objControlConexion->cerrarBd();
    }
    /*
        Qué se debe listar? todo el actor?
    */
    function listarResponsablesPorIndicador($fkIdIndicador)
    {
        $comandoSql = "SELECT ResponsablesPorIndicador.fkidresponsable,actor.nombre,tipoactor.nombre 
            FROM ResponsablesPorIndicador INNER JOIN actor ON actor.fkidresponsable = actor.id
            INNER JOIN tipoactor ON actor.fkidtipoactor = tipoactor.id
            WHERE fkidindicador = '$fkIdIndicador'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloActor = array();
            $i = 0;
            while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $objActor = new Actor("", "",0);
                $objActor->setId($row['id']);
                $objActor->setNombre($row['nombre']);
                $objActor->setFkIdTipoActor($row['fkidtipoactor']);
                $arregloActor[$i] = $objActor;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloActor;
    }
}
?>