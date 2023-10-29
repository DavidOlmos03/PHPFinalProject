<?php
    class ControlSentido{
        
	   var $objSentido;

        function __construct($objSentido){
            $this->objSentido = $objSentido;
        }

        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $usu = $this->objSentido->getNomSentido(); 
                $con = $this->objSentido->getContrasena();
                $comandoSql = "SELECT * FROM tblSentido WHERE nomSentido='$usu' AND contrasena='$con'";
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

        function consultarRolesPorSentido($nomUsu){
            $msg = "ok";
            $listadoRolesDelSentido = [];
            $comandoSQL = "SELECT fkIdRol FROM tblrol_Sentido WHERE fkNomSentido='$nomUsu'";
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
                        $listadoRolesDelSentido[$i] = $row[0];
                        $i++;
                    }
                    $objControlConexion->cerrarBd();
                }
            }
            catch (Exception $objExcetion)
            {
                $msg = $objExcetion->getMessage();
            }
            return $listadoRolesDelSentido;
        }

     
        function guardar(){
            $id = $this->objSentido->getId(); 
            $nombre = $this->objSentido->getNombre();
                
            $comandoSql = "INSERT INTO sentido (id,nombre) VALUES ('$id', '$nombre')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objSentido->getId(); 
        
            $comandoSql = "SELECT * FROM sentido WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objSentido->setNombre($row['nombre']);
            }
            $objControlConexion->cerrarBd();
            return $this->objSentido;
        }

        function modificar(){
            $id = $this->objSentido->getId(); 
            $nombre = $this->objSentido->getNombre();
            
            $comandoSql = "UPDATE sentido SET nombre='$nombre' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id = $this->objSentido->getId(); 
            $comandoSql = "DELETE FROM sentido WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }


        function listar(){
            $comandoSql = "SELECT * FROM sentido";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloSentido = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objSentido = new Sentido(0,"");
                    $objSentido->setId($row['id']);
                    $objSentido->setNombre($row['nombre']);
                    $arregloSentido[$i] = $objSentido;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloSentido;
        }

    }
?>