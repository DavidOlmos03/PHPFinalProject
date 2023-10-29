<?php
    class ControlResultadoIndicador{
        
	   var $objResultadoIndicador;

        function __construct($objResultadoIndicador){
            $this->objResultadoIndicador = $objResultadoIndicador;
        }
/*
        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $usu = $this->objResultadoIndicador->getNomResultadoIndicador(); 
                $con = $this->objResultadoIndicador->getContrasena();
                $comandoSql = "SELECT * FROM tblResultadoIndicador WHERE nomResultadoIndicador='$usu' AND contrasena='$con'";
                $objControlConexion = new ControlConexion();
                $objControlConexion->abrirBd($GLOBALS['serv'], GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
                $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
                try
                {
                    if (mysqli_num_rows($recordSet) > 0) 
                    {
                        $validar = true;
                    }
                    $objControlConexion->cerrarBd();
                }
                catch (Exception $objExcetion)
                {
                    $msg = $objExcetion->getMessage();
                } 
                return $validar;
        }

        function consultarRolesPorResultadoIndicador($nomUsu){
            $msg = "ok";
            $listadoRolesDelResultadoIndicador = [];
            $comandoSQL = "SELECT fkIdRol FROM tblrol_ResultadoIndicador WHERE fkNomResultadoIndicador='$nomUsu'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSQL);
            try
            {
                if (mysqli_num_rows($recordSet) > 0)
                {
                    $i = 0;
                    while ($row = $recordSet->fetch_array(MYSQLI_BOTH))
                    {
                        $listadoRolesDelResultadoIndicador[$i] = $row[0];
                        $i++;
                    }
                    $objControlConexion->cerrarBd();
                }
            }
            catch (Exception $objExcetion)
            {
                $msg = $objExcetion->getMessage();
            }
            return $listadoRolesDelResultadoIndicador;
        }
*/
        function guardar(){
            $id = $this->objResultadoIndicador->getId(); 
            $resultado = $this->objResultadoIndicador->getResultado();
            $fechacalculo = $this->objResultadoIndicador->getFechaCalculo();
            $fkidindicador = $this->objResultadoIndicador->getFkIdIndicador();
                
            $comandoSql = "INSERT INTO resultadoindicador(id,resultado,fechacalculo,fkidindicador) VALUES ('$id', '$resultado','$fechacalculo','$fkidindicador')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objResultadoIndicador->getId(); 
        
            $comandoSql = "SELECT * FROM resultadoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objResultadoIndicador->setResultado($row['resultado']);
                $this->objResultadoIndicador->setFechaCalculo($row['fechacalculo']);
                $this->objResultadoIndicador->setFkIdIndicador($row['fkidindicador']);
            }
            $objControlConexion->cerrarBd();
            return $this->objResultadoIndicador;
        }

        function modificar(){
            $id = $this->objResultadoIndicador->getId(); 
            $resultado = $this->objResultadoIndicador->getResultado();
            $fechacalculo = $this->objResultadoIndicador->getFechaCalculo();
            $fkidindicador = $this->objResultadoIndicador->getFkIdIndicador();
            
            $comandoSql = "UPDATE resultadoindicador SET resultado='$resultado',fechacalculo='$fechacalculo',fkidindicador='$fkidindicador' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objResultadoIndicador->getId(); 
            $comandoSql = "DELETE FROM resultadoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM resultadoindicador";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($recordSet && mysqli_num_rows($recordSet) > 0) {
                $arregloResultadoIndicadors = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objResultadoIndicador = new ResultadoIndicador("","","","");
                    $objResultadoIndicador->setId($row['id']);
                    $objResultadoIndicador->setResultado($row['resultado']);
                    $objResultadoIndicador->setFechaCalculo($row['fechacalculo']);
                    $objResultadoIndicador->setFkIdIndicador($row['fkidindicador']);
                    $arregloResultadoIndicadors[$i] = $objResultadoIndicador;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloResultadoIndicadors;
        }
    }
?>