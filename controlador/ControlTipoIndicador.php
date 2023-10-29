<?php
    class ControlTipoIndicador{
        
	   var $objTipoIndicador;

        function __construct($objTipoIndicador){
            $this->objTipoIndicador = $objTipoIndicador;
        }

        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $usu = $this->objTipoIndicador->getNomTipoIndicador(); 
                $con = $this->objTipoIndicador->getContrasena();
                $comandoSql = "SELECT * FROM tblTipoIndicador WHERE nomTipoIndicador='$usu' AND contrasena='$con'";
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

        function consultarRolesPorTipoIndicador($nomUsu){
            $msg = "ok";
            $listadoRolesDelTipoIndicador = [];
            $comandoSQL = "SELECT fkIdRol FROM tblrol_TipoIndicador WHERE fkNomTipoIndicador='$nomUsu'";
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
                        $listadoRolesDelTipoIndicador[$i] = $row[0];
                        $i++;
                    }
                    $objControlConexion->cerrarBd();
                }
            }
            catch (Exception $objExcetion)
            {
                $msg = $objExcetion->getMessage();
            }
            return $listadoRolesDelTipoIndicador;
        }

        function guardar(){
            $id = $this->objTipoIndicador->getId(); 
            $nombre = $this->objTipoIndicador->getNombre();
                
            $comandoSql = "INSERT INTO TipoIndicador(id,nombre) VALUES ('$id', '$nombre')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objTipoIndicador->getId(); 
        
            $comandoSql = "SELECT * FROM tipoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objTipoIndicador->setNombre($row['nombre']);
            }
            $objControlConexion->cerrarBd();
            return $this->objTipoIndicador;
        }

        function modificar(){
            $id = $this->objTipoIndicador->getId(); 
            $nombre = $this->objTipoIndicador->getNombre();
            
            $comandoSql = "UPDATE tipoindicador SET nombre='$nombre' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objTipoIndicador->getId(); 
            $comandoSql = "DELETE FROM tipoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM tipoindicador";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloTipoIndicador = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objTipoIndicador = new TipoIndicador(0,"");
                    $objTipoIndicador->setId($row['id']);
                    $objTipoIndicador->setNombre($row['nombre']);
                    $arregloTipoIndicador[$i] = $objTipoIndicador;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloTipoIndicador;
        }
    }
?>