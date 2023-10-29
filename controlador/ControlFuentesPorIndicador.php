<?php
    class ControlFuentesPorIndicador{
        var $objFuentesPorIndicador;

        function __construct($objFuentesPorIndicador){
            $this->objFuentesPorIndicador = $objFuentesPorIndicador;
        }

        function guardar(){
            $fkIdFuente = $this->objFuentesPorIndicador->getFkIdFuente(); 
            $fkIdIndicador = $this->objFuentesPorIndicador->getFkIdIndicador();
            $comando = "insert into fuentesporindicador(fkidfuente,fkidindicador) values('$fkIdFuente',$fkIdIndicador)"; 
            $objControlConexion = new ControlConexion(); 
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
            $objControlConexion->ejecutarComandoSql($comando); 
            $objControlConexion->cerrarBd();
        }

        /*
            Hay que arreglar este codigo para utilizarlo en el consultar de Indicador
        */
        function listarRolesDelUsuario($fkIdIndicador){
            $comandoSql = "SELECT rol_usuario.fkidrol,rol.nombre 
            FROM rol_usuario INNER JOIN ROL ON rol_usuario.fkidrol = rol.id
            WHERE fkemail = '$fkIdIndicador'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloFuentes = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objFuente = new Fuente(0,"");
                    $objFuente->setId($row['id']);
                    $objFuente->setNombre($row['nombre']);
                    $arregloFuentes[$i] = $objFuente;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloFuentes;
        }
    }
?>