<?php
    class ControlTipoActor{
        
	   var $objTipoActor;

        function __construct($objTipoActor){
            $this->objTipoActor = $objTipoActor;
        }

        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $usu = $this->objTipoActor->getNomTipoActor(); 
                $con = $this->objTipoActor->getContrasena();
                $comandoSql = "SELECT * FROM tblTipoActor WHERE nomTipoActor='$usu' AND contrasena='$con'";
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

        function consultarRolesPorTipoActor($nomUsu){
            $msg = "ok";
            $listadoRolesDelTipoActor = [];
            $comandoSQL = "SELECT fkIdRol FROM tblrol_TipoActor WHERE fkNomTipoActor='$nomUsu'";
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
                        $listadoRolesDelTipoActor[$i] = $row[0];
                        $i++;
                    }
                    $objControlConexion->cerrarBd();
                }
            }
            catch (Exception $objExcetion)
            {
                $msg = $objExcetion->getMessage();
            }
            return $listadoRolesDelTipoActor;
        }

        function guardar(){
            $id = $this->objTipoActor->getId(); 
            $nombre = $this->objTipoActor->getNombre();
                
            $comandoSql = "INSERT INTO TipoActor(id,nombre) VALUES ('$id', '$nombre')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objTipoActor->getId(); 
        
            $comandoSql = "SELECT * FROM tipoactor WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objTipoActor->setNombre($row['nombre']);
            }
            $objControlConexion->cerrarBd();
            return $this->objTipoActor;
        }

        function modificar(){
            $id = $this->objTipoActor->getId(); 
            $nombre = $this->objTipoActor->getNombre();
            
            $comandoSql = "UPDATE tipoactor SET nombre='$nombre' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objTipoActor->getId(); 
            $comandoSql = "DELETE FROM tipoactor WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM tipoactor";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloTipoActors = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objTipoActor = new TipoActor(0,"");
                    $objTipoActor->setId($row['id']);
                    $objTipoActor->setNombre($row['nombre']);
                    $arregloTipoActors[$i] = $objTipoActor;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloTipoActors;
        }
    }
?>