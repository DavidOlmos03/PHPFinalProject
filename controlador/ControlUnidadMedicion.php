<?php
    class ControlUnidadMedicion{
        
	   var $objUnidadMedicion;

        function __construct($objUnidadMedicion){
            $this->objUnidadMedicion = $objUnidadMedicion;
        }

        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $usu = $this->objUnidadMedicion->getNomUnidadMedicion(); 
                $con = $this->objUnidadMedicion->getContrasena();
                $comandoSql = "SELECT * FROM tblUnidadMedicion WHERE nomUnidadMedicion='$usu' AND contrasena='$con'";
                $objControlConexion = new ControlConexion();
                $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
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

        function consultarRolesPorUnidadMedicion($nomUsu){
            $msg = "ok";
            $listadoRolesDelUnidadMedicion = [];
            $comandoSQL = "SELECT fkIdRol FROM tblrol_UnidadMedicion WHERE fkNomUnidadMedicion='$nomUsu'";
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
                        $listadoRolesDelUnidadMedicion[$i] = $row[0];
                        $i++;
                    }
                    $objControlConexion->cerrarBd();
                }
            }
            catch (Exception $objExcetion)
            {
                $msg = $objExcetion->getMessage();
            }
            return $listadoRolesDelUnidadMedicion;
        }

        function guardar(){
            $id = $this->objUnidadMedicion->getId(); 
            $descripcion = $this->objUnidadMedicion->getDescripcion();
                
            $comandoSql = "INSERT INTO UnidadMedicion(id,descripcion) VALUES ('$id', '$descripcion')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objUnidadMedicion->getId(); 
        
            $comandoSql = "SELECT * FROM unidadmedicion WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objUnidadMedicion->setDescripcion($row['descripcion']);
            }
            $objControlConexion->cerrarBd();
            return $this->objUnidadMedicion;
        }

        function modificar(){
            $id = $this->objUnidadMedicion->getId(); 
            $descripcion = $this->objUnidadMedicion->getDescripcion();
            
            $comandoSql = "UPDATE unidadmedicion SET descripcion='$descripcion' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objUnidadMedicion->getId(); 
            $comandoSql = "DELETE FROM unidadmedicion WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM unidadmedicion";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloUnidadMedicion = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objUnidadMedicion = new UnidadMedicion(0,"");
                    $objUnidadMedicion->setId($row['id']);
                    $objUnidadMedicion->setDescripcion($row['descripcion']);
                    $arregloUnidadMedicion[$i] = $objUnidadMedicion;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloUnidadMedicion;
        }
    }
?>