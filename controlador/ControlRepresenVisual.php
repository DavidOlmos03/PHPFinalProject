<?php
    class ControlRepresenVisual{
        
	   var $objRepresenVisual;

        function __construct($objRepresenVisual){
            $this->objRepresenVisual = $objRepresenVisual;
        }
/*
        function validarIngreso(){
                $msg = "ok";
                $validar = false;
                $usu = $this->objRepresenVisual->getNomRepresenVisual(); 
                $con = $this->objRepresenVisual->getNombre();
                $comandoSql = "SELECT * FROM tblRepresenVisual WHERE nomRepresenVisual='$usu' AND Nombre='$con'";
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

        function consultarRolesPorRepresenVisual($nomUsu){
            $msg = "ok";
            $listadoRolesDelRepresenVisual = [];
            $comandoSQL = "SELECT fkIdRol FROM tblrol_RepresenVisual WHERE fkNomRepresenVisual='$nomUsu'";
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
                        $listadoRolesDelRepresenVisual[$i] = $row[0];
                        $i++;
                    }
                    $objControlConexion->cerrarBd();
                }
            }
            catch (Exception $objExcetion)
            {
                $msg = $objExcetion->getMessage();
            }
            return $listadoRolesDelRepresenVisual;
        }*/

        function guardar(){
            $id = $this->objRepresenVisual->getId(); 
            $nom = $this->objRepresenVisual->getNombre(); 
                
            $comandoSql = "INSERT INTO RepresenVisual(id,nombre) VALUES ('$id','$nom') ";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        
        function consultar(){
            $id= $this->objRepresenVisual->getId(); 
        
            $comandoSql = "SELECT * FROM represenvisual WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $this->objRepresenVisual->setNombre($row['nombre']);
            }
            $objControlConexion->cerrarBd();
            return $this->objRepresenVisual;
        }
        /*
        **Este modificar se hace diferente, pues se ingresan dos datos newName y oldName
        **donde se cambia el oldName por el newName ingresado (PENDIENTE)
        */
        function modificar(){
            $id = $this->objRepresenVisual->getId(); 
            $nom = $this->objRepresenVisual->getNombre();

            $comandoSql = "UPDATE RepresenVisual SET nombre='$nom' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function borrar(){
            $id= $this->objRepresenVisual->getId(); 
            $comandoSql = "DELETE FROM RepresenVisual WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar(){
            $comandoSql = "SELECT * FROM RepresenVisual";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloRepresenVisuals = array();
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objRepresenVisual = new represenVisual("",""); 
                    $objRepresenVisual->setId($row['id']);
                    $objRepresenVisual->setNombre($row['nombre']);
                    $arregloRepresenVisuals[$i] = $objRepresenVisual;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloRepresenVisuals;
        }
    }
?>