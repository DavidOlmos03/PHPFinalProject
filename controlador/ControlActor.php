<?php
    class ControlActor{
        
	   var $objActor;

        function __construct($objActor){
            $this->objActor = $objActor;
        }
/*
        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $usu = $this->objActor->getNomActor(); 
                $con = $this->objActor->getContrasena();
                $comandoSql = "SELECT * FROM tblActor WHERE nomActor='$usu' AND contrasena='$con'";
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

        function consultarRolesPorActor($nomUsu){
            $msg = "ok";
            $listadoRolesDelActor = [];
            $comandoSQL = "SELECT fkIdRol FROM tblrol_Actor WHERE fkNomActor='$nomUsu'";
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
                        $listadoRolesDelActor[$i] = $row[0];
                        $i++;
                    }
                    $objControlConexion->cerrarBd();
                }
            }
            catch (Exception $objExcetion)
            {
                $msg = $objExcetion->getMessage();
            }
            return $listadoRolesDelActor;
        }
*/
        function guardar(){
            $id = $this->objActor->getId(); 
            $nombre = $this->objActor->getNombre();
            $fkidtipoactor = $this->objActor->getFkIdTipoActor();
                
            $comandoSql = "INSERT INTO Actor(id,nombre,fkidtipoactor) VALUES ('$id', '$nombre','$fkidtipoactor')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objActor->getId(); 
        
            $comandoSql = "SELECT * FROM Actor WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objActor->setNombre($row['nombre']);
                $this->objActor->setFkIdTipoActor($row['fkidtipoactor']);
            }
            $objControlConexion->cerrarBd();
            return $this->objActor;
        }

        function modificar(){
            $id = $this->objActor->getId(); 
            $nombre = $this->objActor->getNombre();
            $fkidtipoactor = $this->objActor->getFkIdTipoActor();
            
            $comandoSql = "UPDATE Actor SET nombre='$nombre',fkidtipoactor='$fkidtipoactor' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objActor->getId(); 
            $comandoSql = "DELETE FROM Actor WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM Actor";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($recordSet && mysqli_num_rows($recordSet) > 0) {
                $arregloActors = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objActor = new Actor("","","");
                    $objActor->setId($row['id']);
                    $objActor->setNombre($row['nombre']);
                    $objActor->setFkIdTipoActor($row['fkidtipoactor']);
                    $arregloActors[$i] = $objActor;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloActors;
        }
    }
?>