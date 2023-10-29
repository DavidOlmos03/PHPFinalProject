<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlResultadoIndicador.php';
	include '../modelo/ResultadoIndicador.php';
	$boton = "";
	$id = "";
	$resultado = "";
	$fechacalculo = "";
	$fkidindicador = "";
	$objControlResultadoIndicador = new ControlResultadoIndicador(null);
	$arregloResultadoIndicadors = $objControlResultadoIndicador->listar();
	//var_dump($arregloResultadoIndicadors);
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtId'])) $id = $_POST['txtId'];
	if (isset($_POST['txtResultado'])) $resultado = $_POST['txtResultado'];
	if (isset($_POST['txtFechaCalculo'])) $fechacalculo = $_POST['txtFechaCalculo'];
	if (isset($_POST['txtFkIdIndicador'])) $fkidindicador = $_POST['txtFkIdIndicador'];
	switch ($boton) {
		case 'Guardar':
			$objResultadoIndicador = new ResultadoIndicador($id, $resultado,$fechacalculo,$fkidindicador);
			$objControlResultadoIndicador = new ControlResultadoIndicador($objResultadoIndicador);
			
			

			$objControlResultadoIndicador->guardar();
			header('Location: vistaResultadoIndicador.php');
			break;
		case 'Consultar':
			$objResultadoIndicador = new ResultadoIndicador($id, "","","");
			$objControlResultadoIndicador = new ControlResultadoIndicador($objResultadoIndicador);
			$objResultadoIndicador = $objControlResultadoIndicador->consultar();
			$resultado = $objResultadoIndicador->getResultado();
			$fechacalculo = $objResultadoIndicador->getFechaCalculo();
			$fkidindicador = $objResultadoIndicador->getFkIdIndicador();
			break;
		case 'Modificar':
			$objResultadoIndicador = new ResultadoIndicador($id, $resultado,$fechacalculo,$fkidindicador);
			$objControlResultadoIndicador = new ControlResultadoIndicador($objResultadoIndicador);
			$objControlResultadoIndicador->modificar();
			header('Location: vistaResultadoIndicador.php');
			break;
		case 'Borrar':
			$objResultadoIndicador = new ResultadoIndicador($id, "","","");
			$objControlResultadoIndicador = new ControlResultadoIndicador($objResultadoIndicador);
			$objControlResultadoIndicador->borrar();
			header('Location: vistaResultadoIndicador.php');
			break;
		
		default:
			# code...
			break;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>ResultadoIndicadors</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../vista/css/misCss1.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/misFunciones.js"></script>
<script src="js/misFunciones2.js"></script>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<!--Se agrega una barra de navegación para acceder a los CRUDs, y agregar la funcionalidad "buscar"-->	
		<div class="navBar">
			<?php require('./navbar.php')?>
		</div>
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2 class="miEstilo">Gestión <b>ResultadoIndicadors</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#crudModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE84E;</i> <span>Gestión ResultadoIndicadors</span></a>
						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Id</th>
						<th>Resultado</th>
						<th>Fecha calculo</th>
						<th>Fk id indicador</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for($i = 0; $i < count($arregloResultadoIndicadors); $i++){
					?>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td><?php echo $arregloResultadoIndicadors[$i]->getId();?></td>
							<td><?php echo $arregloResultadoIndicadors[$i]->getResultado();?></td>
							<td><?php echo $arregloResultadoIndicadors[$i]->getFechaCalculo();?></td>
							<td><?php echo $arregloResultadoIndicadors[$i]->getFkIdIndicador();?></td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						
					<?php
					}
					?>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- crud Modal HTML -->
<div id="crudModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="vistaResultadoIndicador.php" method="post" id="Form">
				<div class="modal-header">						
					<h4 class="modal-title">ResultadoIndicador</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Id</label>
						<input type="id" id="txtId" name="txtId" class="form-control" value="<?php echo $id ?>">
					</div>
					<div class="form-group">
						<label>resultado</label>
						<input type="text" id="txtResultado" name="txtResultado" class="form-control" value="<?php echo $resultado ?>">
					</div>
					<div class="form-group">
						<label>fechacalculo</label>
						<input type="text" id="txtFechaCalculo" name="txtFechaCalculo" class="form-control" value="<?php echo $fechacalculo ?>">
					</div>
					<div class="form-group">
						<label>fkidindicador</label>
						<input type="text" id="txtFkIdIndicador" name="txtFkIdIndicador" class="form-control" value="<?php echo $fkidindicador ?>">
					</div>
					<div class="form-group">
						<input type="submit" id="btnGuardar" name="bt" class="btn btn-success" value="Guardar">
						<input type="submit" id="btnConsultar" name="bt" class="btn btn-success" value="Consultar">
						<input type="submit" id="btnModificar" name="bt" class="btn btn-warning" value="Modificar">
						<input type="submit" id="btnBorrar" name="bt" class="btn btn-warning" value="Borrar">
						<input type="button" id="btnLimpiar" name="bt" class="btn btn-warning" value="Limpiar" onclick="limpiarCampos()">
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>