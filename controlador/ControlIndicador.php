<?php
class ControlIndicador
{

    var $objIndicador;

    function __construct($objIndicador)
    {
        $this->objIndicador = $objIndicador;
    }
/*
    function validarIngreso()
    {
        //$msg = "ok";
        $validar = false;
        $ema = $this->objIndicador->getEmail();
        $con = $this->objIndicador->getContrasena();
        $comandoSql = "SELECT * FROM Indicador WHERE email='$ema' AND contrasena='$con'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        try {
            if (mysqli_num_rows($recordSet) > 0) {
                $validar = true;
            }
            $objControlConexion->cerrarBd();
        } catch (Exception $objExcetion) {
            $msg = $objExcetion->getMessage();
        }
        return $validar;
    }

    function consultarRolesPorIndicador($nomUsu)
    {
        $msg = "ok";
        $listadoRolesDelIndicador = [];
        $comandoSQL = "SELECT fkIdRol FROM tblrol_Indicador WHERE fkNomIndicador='$nomUsu'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSQL);
        try {
            if (mysqli_num_rows($recordSet) > 0) {
                $i = 0;
                while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                    $listadoRolesDelIndicador[$i] = $row[0];
                    $i++;
                }
                $objControlConexion->cerrarBd();
            }
        } catch (Exception $objExcetion) {
            $msg = $objExcetion->getMessage();
        }
        return $listadoRolesDelIndicador;
    }
*/ 
    function guardar()
    {
        $id  = $this->objIndicador->getId();
        $codigo = $this->objIndicador->getCodigo();
        $nombre = $this->objIndicador->getNombre();
        $objetivo = $this->objIndicador->getObjetivo();
        $alcance = $this->objIndicador->getAlcance();
        $formula = $this->objIndicador->getFormula();
        $fkIdTipoIndicador  = $this->objIndicador->getFkIdTipoIndicador();
        $fkIdUnidadMedicion  = $this->objIndicador->getFkIdUnidadMedicion();
        $meta = $this->objIndicador->getMeta();
        $fkIdSentido  = $this->objIndicador->getFkIdSentido();
        $fkIdFrecuencia = $this->objIndicador->getFkIdFrecuencia();
        $fkIdArticulo  = $this->objIndicador->getFkIdArticulo();
        $fkIdLiteral = $this->objIndicador->getFkIdLiteral();
        $fkIdNumeral  = $this->objIndicador->getFkIdNumeral();
        $fkIdParagrafo  = $this->objIndicador->getFkIdParagrafo();

        $comandoSql = "INSERT INTO Indicador(id,codigo,nombre,objetivo,alcance,formula,fkidtipoindicador,fkidunidadmedicion,meta,fkidsentido,fkidfrecuencia,fkidarticulo,fkidliteral,fkidnumeral,fkidparagrafo) 
        VALUES ('$id', '$codigo','$nombre','$objetivo','$alcance','$formula','$fkIdTipoIndicador','$fkIdUnidadMedicion','$meta','$fkIdSentido','$fkIdFrecuencia','$fkIdArticulo',
        '$fkIdLiteral','$fkIdNumeral','$fkIdParagrafo'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar()
    {
        $id  = $this->objIndicador->getId();

        $comandoSql = "SELECT * FROM Indicador WHERE email = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $this->objIndicador->setContrasena($row['contrasena']);
        }
        $objControlConexion->cerrarBd();
        return $this->objIndicador;
    }

    function modificar()
    {
        $id  = $this->objIndicador->getId();
        $codigo = $this->objIndicador->getCodigo();
        $nombre = $this->objIndicador->getNombre();
        $objetivo = $this->objIndicador->getnObjetivo();
        $alcance = $this->objIndicador->getAlcance();
        $formula = $this->objIndicador->getFormula();
        $fkIdTipoIndicador  = $this->objIndicador->getFkIdTipoIndicador();
        $fkIdUnidadMedicion  = $this->objIndicador->getFkIdUnidadMedicion();
        $meta = $this->objIndicador->getMeta();
        $fkIdSentido  = $this->objIndicador->getFkIdSentido();
        $fkIdFrecuencia = $this->objIndicador->getFkIdFrecuencia();
        $fkIdArticulo  = $this->objIndicador->getFkIdArticulo();
        $fkIdLiteral = $this->objIndicador->getFkIdLiteral();
        $fkIdNumeral  = $this->objIndicador->getFkIdNumeral();
        $fkIdParagrafo  = $this->objIndicador->getFkIdParagrafo();

        $comandoSql = "UPDATE Indicador SET codigo='$codigo',nombre='$nombre',objetivo='$objetivo',alcance='$alcance',formula='$formula',
        fkidtipoindicador='$fkIdTipoIndicador',fkidinidadmedicion='$fkIdUnidadMedicion',meta='$meta',fkidsentido='$fkIdSentido',fkidfrecuencia='$fkIdFrecuencia',
        fkidarticulo='$fkIdArticulo',fkidliteral='$fkIdLiteral',fkidnumeral='$fkIdNumeral',fkidparagrafo='$fkIdParagrafo', WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar()
    {
        $id = $this->objIndicador->getId();
        $comandoSql = "DELETE FROM Indicador WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar()
    {
        $comandoSql = "SELECT * FROM Indicador";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloIndicadors = array();
            $i = 0;
            while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $objIndicador = new Indicador(0, "", "", "", "", 0, 0, "", 0, 0, 0, 0, 0, 0, 0);
                $objIndicador->setId($row['id']);
                $objIndicador->setCodigo($row['codigo']);
                $objIndicador->setNombre($row['nombre']);
                $objIndicador->setObjetivo($row['objetivo']);
                $objIndicador->setAlcance($row['alcance']);
                $objIndicador->setFormula($row['formula']);
                $objIndicador->setFkIdTipoIndicador($row['fkidtipoindicador']);
                $objIndicador->setFkIdUnidadMedicion($row['fkidunidadmedicion']);
                $objIndicador->setMeta($row['meta']);
                $objIndicador->setFkIdSentido($row['fkidsentido']);
                $objIndicador->setFkIdFrecuencia($row['fkidfrecuencia']);
                $objIndicador->setFkIdArticulo($row['fkidarticulo']);
                $objIndicador->setFkIdLiteral($row['fkidliteral']);
                $objIndicador->setFkIdNumeral($row['fkidnumeral']);
                $objIndicador->setFkIdParagrafo($row['fkidparagrafo']);
                $arregloIndicadors[$i] = $objIndicador;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloIndicadors;
    }
}
?>