<?php
    class ControlVariable{
        
	   var $objVariable;

        function __construct($objVariable){
            $this->objVariable = $objVariable;
        }
/*
        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $usu = $this->objVariable->getNomVariable(); 
                $con = $this->objVariable->getContrasena();
                $comandoSql = "SELECT * FROM tblVariable WHERE nomVariable='$usu' AND contrasena='$con'";
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

        function consultarRolesPorVariable($nomUsu){
            $msg = "ok";
            $listadoRolesDelVariable = [];
            $comandoSQL = "SELECT fkIdRol FROM tblrol_Variable WHERE fkNomVariable='$nomUsu'";
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
                        $listadoRolesDelVariable[$i] = $row[0];
                        $i++;
                    }
                    $objControlConexion->cerrarBd();
                }
            }
            catch (Exception $objExcetion)
            {
                $msg = $objExcetion->getMessage();
            }
            return $listadoRolesDelVariable;
        }
*/
        function guardar(){
            $id = $this->objVariable->getId(); 
            $nombre = $this->objVariable->getNombre();
            $fechacreacion = $this->objVariable->getFechaCreacion();
            $fkemailusuario = $this->objVariable->getFkEmailUsuario();
                
            $comandoSql = "INSERT INTO Variable(id,nombre,fechacreacion,fkemailusuario) VALUES ('$id', '$nombre','$fechacreacion','$fkemailusuario')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objVariable->getId(); 
        
            $comandoSql = "SELECT * FROM Variable WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objVariable->setNombre($row['nombre']);
                $this->objVariable->setFechaCreacion($row['fechacreacion']);
                $this->objVariable->setFkEmailUsuario($row['fkemailusuario']);
            }
            $objControlConexion->cerrarBd();
            return $this->objVariable;
        }

        function modificar(){
            $id = $this->objVariable->getId(); 
            $nombre = $this->objVariable->getNombre();
            $fechacreacion = $this->objVariable->getFechaCreacion();
            $fkemailusuario = $this->objVariable->getFkEmailUsuario();
            
            $comandoSql = "UPDATE Variable SET nombre='$nombre',fechacreacion='$fechacreacion',fkemailusuario='$fkemailusuario' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objVariable->getId(); 
            $comandoSql = "DELETE FROM Variable WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM Variable";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($recordSet && mysqli_num_rows($recordSet) > 0) {
                $arregloVariables = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objVariable = new Variable("","","","");
                    $objVariable->setId($row['id']);
                    $objVariable->setNombre($row['nombre']);
                    $objVariable->setFechaCreacion($row['fechacreacion']);
                    $objVariable->setFkEmailUsuario($row['fkemailusuario']);
                    $arregloVariables[$i] = $objVariable;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloVariables;
        }
    }
?>