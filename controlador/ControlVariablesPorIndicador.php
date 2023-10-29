<?php
    class ControlVariablesPorIndicador{
        var $objVariablesPorIndicador;

        function __construct($objVariablesPorIndicador){
            $this->objVariablesPorIndicador = $objVariablesPorIndicador;
        }

        function guardar(){
            $id = $this->objVariablesPorIndicador->getId(); 
            $fkIdVariable = $this->objVariablesPorIndicador->getFkIdVariable(); 
            $fkEmailUsuario = $this->objVariablesPorIndicador->getFkEmailUsuario(); 
            $fkIdIndicador = $this->objVariablesPorIndicador->getFkIdIndicador(); 
            $dato = $this->objVariablesPorIndicador->getDato(); 
            $fechaDato = $this->objVariablesPorIndicador->getFechaDato();
            $comando = "insert into rol_usuario(id,fkidvariable,fkidindicador,dato,fkemailusuario,fechadato) values('$id',$fkIdVariable,'$fkIdIndicador','$dato','$fkEmailUsuario','$fechaDato')"; 
            $objControlConexion = new ControlConexion(); 
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']); //Se invoca el método abrirBd.
            $objControlConexion->ejecutarComandoSql($comando); 
            $objControlConexion->cerrarBd();
        }
/*
        function listarRolesDelUsuario($fkEmail){
            $comandoSql = "SELECT rol_usuario.fkidrol,rol.nombre 
            FROM rol_usuario INNER JOIN ROL ON rol_usuario.fkidrol = rol.id
            WHERE fkemail = '$fkEmail'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloRoles = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objRol = new Rol(0,"");
                    $objRol->setId($row['id']);
                    $objRol->setNombre($row['nombre']);
                    $arregloRoles[$i] = $objRol;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloRoles;
        }*/
    }
?>