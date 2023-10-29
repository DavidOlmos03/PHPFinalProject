<?php
include '../controlador/configBd.php';
include '../controlador/ControlConexion.php';
/*
	Controladores necesarios
*/
include '../controlador/ControlIndicador.php';
include '../controlador/ControlRepresenVisual.php';
include '../controlador/ControlFuente.php';
include '../controlador/ControlVariable.php';
include '../controlador/ControlTipoActor.php';
include '../controlador/ControlArticulo.php';
include '../controlador/ControlLiteral.php';
include '../controlador/ControlNumeral.php';
include '../controlador/ControlParagrafo.php';
include '../controlador/ControlSentido.php';
include '../controlador/ControlTipoIndicador.php';
include '../controlador/ControlUnidadMedicion.php';
/*
	Controladores necesarios (tablas intermedias)
*/
include '../controlador/ControlRepresenVisualPorIndicador.php';
include '../controlador/ControlFuentesPorIndicador.php';
include '../controlador/ControlVariablesPorIndicador.php';
include '../controlador/ControlResponsablesPorIndicador.php';
include '../controlador/ControlActor.php';
/*
	Modelos necesarios
*/
include '../modelo/Indicador.php';
include '../modelo/RepresenVisual.php';
include '../modelo/Fuente.php';
include '../modelo/Variable.php';
include '../modelo/TipoActor.php';
include '../modelo/Articulo.php';
include '../modelo/Literal.php';
include '../modelo/Numeral.php';
include '../modelo/Paragrafo.php';
include '../modelo/Sentido.php';
include '../modelo/TipoIndicador.php';
include '../modelo/UnidadMedicion.php';
/*
	Modelos necesarios (Tablas intermedias)
*/
include '../modelo/RepresenVisualPorIndicador.php';
include '../modelo/FuentesPorIndicador.php';
include '../modelo/VariablesPorIndicador.php';
include '../modelo/ResponsablesPorIndicador.php';
include '../modelo/Actor.php';

$boton = "";
$id = "";
$codigo = "";
$nombre = "";
$objetivo = "";
$alcance = "";
$formula = "";
$fkIdTipoIndicador = "";
$fkIdUnidadMedicion = "";
$meta = "";
$fkIdSentido = "";
$fkIdFrecuencia = "";
$fkIdArticulo = "";
$fkIdLiteral = "";
$fkIdNumeral = "";
$fkIdParagrafo = "";
/*
	Creación de los listbox
*/
//unidadmedicion
$listbox0 = array();
$listbox1 = array();
$listbox2 = array();
$listbox3 = array();
//Articulo
$listbox4 = array();
//Literal
$listbox5 = array();
//numeral
$listbox6 = array();
//pagrafo
$listbox7 = array();
//sentido
$listbox8 = array();
//tipoindicador
$listbox9 = array();
//actor
$listbox10 = array();
//tipoactor
$listbox11 = array();
//frecuencia
//$listbox12 = array();



/*
	instancia de objetos y creacion de arreglos
*/
$objControlIndicador = new ControlIndicador(null);
$arregloIndicadors = $objControlIndicador->listar();

$objControlRepresenVisual = new ControlRepresenVisual(null);
$arregloRepresenVisuals = $objControlRepresenVisual->listar();

$objControlFuente = new ControlFuente(null);
$arregloFuentes = $objControlFuente->listar();

$objControlVariable = new ControlVariable(null);
$arregloVariables = $objControlVariable->listar();

$objControlArticulo = new ControlArticulo(null);
$arregloArticulo = $objControlArticulo->listar();

$objControlLiteral = new ControlLiteral(null);
$arregloLiteral = $objControlLiteral->listar();

$objControlNumeral = new ControlNumeral(null);
$arregloNumeral = $objControlNumeral->listar();

$objControlParagrafo = new ControlParagrafo(null);
$arregloParagrafo = $objControlParagrafo->listar();

$objControlActor = new ControlActor(null);
$arregloActors = $objControlActor->listar();

$objControlTipoActor = new ControlTipoActor(null);
$arregloTipoActors = $objControlTipoActor->listar();

$objControlSentido = new ControlSentido(null);
$arregloSentido = $objControlSentido->listar();

$objControlTipoIndicador = new ControlTipoIndicador(null);
$arregloTipoIndicador= $objControlTipoIndicador->listar();

$objControlUnidadMedicion = new ControlUnidadMedicion(null);
$arregloUnidadMedicion= $objControlUnidadMedicion->listar();


//var_dump($arregloRoles);
if (isset($_POST['bt']))
	$boton = $_POST['bt']; //toma del arreglo post el value del bt	
if (isset($_POST['txtId']))
	$id = $_POST['txtId'];
if (isset($_POST['txtCodigo']))
	$codigo = $_POST['txtCodigo'];
if (isset($_POST['txtnombre']))
	$nombre = $_POST['txtnombre'];
if (isset($_POST['txtObjetivo']))
	$objetivo = $_POST['txtObjetivo'];
if (isset($_POST['txtAlcance']))
	$alcance = $_POST['txtAlcance'];
if (isset($_POST['txtFormula']))
	$formula = $_POST['txtFormula'];
if (isset($_POST['txtMeta']))
	$meta = $_POST['txtMeta'];
if (isset($_POST['txtfkIdFrecuencia']))
	$fkIdFrecuencia = $_POST['txtfkIdFrecuencia'];

/*
	Post de los listbox
*/
if (isset($_POST['listbox0']))
	$listbox0 = $_POST['listbox0'];
if (isset($_POST['listbox1']))
	$listbox1 = $_POST['listbox1'];
if (isset($_POST['listbox2']))
	$listbox2 = $_POST['listbox2'];
if (isset($_POST['listbox3']))
	$listbox3 = $_POST['listbox3'];
if (isset($_POST['listbox4']))
	$listbox4 = $_POST['listbox4'];
if (isset($_POST['listbox5']))
	$listbox5 = $_POST['listbox5'];
if (isset($_POST['listbox6']))
	$listbox6 = $_POST['listbox6'];
if (isset($_POST['listbox7']))
	$listbox7 = $_POST['listbox7'];
if (isset($_POST['listbox8']))
	$listbox8 = $_POST['listbox8'];
if (isset($_POST['listbox9']))
	$listbox9 = $_POST['listbox9'];
if (isset($_POST['listbox10']))
	$listbox10 = $_POST['listbox10'];
if (isset($_POST['listbox11']))
	$listbox11 = $_POST['listbox11'];
/*
	Post de los combobox
*/
if (isset($_POST['combobox0']))
	$combobox0 = $_POST['combobox0'];
if (isset($_POST['combobox4']))
	$combobox4 = $_POST['combobox4'];
if (isset($_POST['combobox5']))
	$combobox5= $_POST['combobox5'];
if (isset($_POST['combobox6']))
	$combobox6 = $_POST['combobox6'];
if (isset($_POST['combobox9']))
	$combobox9 = $_POST['combobox9'];
if (isset($_POST['combobox7']))
	$combobox7 = $_POST['combobox7'];
//var_dump($listbox1);
switch ($boton) {
	case 'Guardar':
		$objIndicador = new Indicador(
			$id,
			$codigo,
			$nombre,
			$objetivo,
			$alcance,
			$formula,
			$fkIdTipoIndicador=$combobox9,
			$fkIdUnidadMedicion=$combobox0,
			$meta,
			$fkIdSentido=$combobox8,
			$fkIdFrecuencia,
			$fkIdArticulo=$combobox4,
			$fkIdLiteral=$combobox5,
			$fkIdNumeral=$combobox6,
			$fkIdParagrafo=$combobox7			
		);
		
		$objControlIndicador = new ControlIndicador($objIndicador);
		$objControlIndicador->guardar();
		
		 /*
		if ($listbox1 != "") {
			for ($i = 0; $i < count($listbox1); $i++) {
				$cadenas = explode(";", $listbox1[$i]);
				$idCadena = $cadenas[0];
				$objRepresenVisualPorIndicador = new RepresenVisualPorIndicador($id, $idCadena);
				$objControlRepresenVisualPorIndicador = new ControlRepresenVisualPorIndicador($objRepresenVisualPorIndicador);
				$objControlRepresenVisualPorIndicador->guardar();
			}
		}
		if ($listbox2 != "") {
			for ($i = 0; $i < count($listbox2); $i++) {
				$cadenas = explode(";", $listbox2[$i]);
				$idCadena = $cadenas[0];
				$objFuentesPorIndicador = new FuentesPorIndicador($id,$idCadena);
				$objControlFuentesPorIndicador = new ControlFuentesPorIndicador($objFuentesPorIndicador);
				$objControlFuentesPorIndicador->guardar();
			}
		}
		if ($listbox3 != "") {
			for ($i = 0; $i < count($listbox3); $i++) {
				$cadenas = explode(";", $listbox3[$i]);
				$idCadena = $cadenas[0];
				$objVariablesPorIndicador = new VariablesPorIndicador($id,$idCadena,"","","","");
				$objControlVariablesPorIndicador = new ControlVariablesPorIndicador($objVariablesPorIndicador);
				$objControlVariablesPorIndicador->guardar();
			}
		} 
		if ($listbox10 != "") {
			for ($i = 0; $i < count($listbox10); $i++) {
				$cadenas = explode(";", $listbox10[$i]);
				$idCadena = $cadenas[0];
				$objVariablesPorIndicador = new VariablesPorIndicador($id,$idCadena,"","","","");
				$objControlVariablesPorIndicador = new ControlVariablesPorIndicador($objVariablesPorIndicador);
				$objControlVariablesPorIndicador->guardar();
			}
		} */
		header('Location: vistaIndicador.php');
		break;
	case 'Consultar':
		$objIndicador = new Indicador($id, "", "", "", "", 0, 0, "", 0, 0, 0, 0, 0, 0, 0);
		$objControlIndicador = new ControlIndicador($objIndicador);
		$objIndicador = $objControlIndicador->consultar();
		$con = $objIndicador->getContrasena();
		//Llenar el listbox1 con la lista de roles del ususario específico.
		$objControlRepresenVisualPorIndicador = new ControlRepresenVisualPorIndicador(null);
		$arregloRepresenVisualConsulta = $objControlRepresenVisualPorIndicador->listarRepresenVisualPorIndicador($id);
		//Asignarle los datos de arregloRolesConsulta al listbox1.

		break;
	case 'Modificar':
		$objIndicador = new Indicador(
			$id,
			$codigo,
			$nombre,
			$objetivo,
			$alcance,
			$formula,
			$fkIdTipoIndicador,
			$fkIdUnidadMedicion,
			$meta,
			$fkIdSentido,
			$fkIdFrecuencia,
			$fkIdArticulo,
			$fkIdLiteral,
			$fkIdNumeral,
			$fkIdParagrafo
		);
		$objControlIndicador = new ControlIndicador($objIndicador);
		$objControlIndicador->modificar();
		header('Location: vistaIndicador.php');
		break;
	case 'Borrar':
		$objIndicador = new Indicador($id, "", "", "", "", 0, 0, "", 0, 0, 0, 0, 0, 0, 0);
		$objControlIndicador = new ControlIndicador($objIndicador);
		$objControlIndicador->borrar();
		header('Location: vistaIndicador.php');
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
	<title>Indicadors</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--<link rel="stylesheet" href="../vista/css/misCss.css">-->
	<link rel="stylesheet" href="../vista/css/misCss1.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="../vista/js/misFunciones.js"></script>
	<script src="../vista/js/misFunciones2.js"></script>
</head>

<body>
	<div class="container-xl">
		<!--Se agrega una barra de navegación para acceder a los CRUDs, y agregar la funcionalidad "buscar"-->
		<div class="navBar">
			<?php require('./navbar.php') ?>
		</div>
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2 class="miEstilo">Gestión <b>Indicadors</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#crudModal" class="btn btn-primary" data-toggle="modal"><i
								class="material-icons">&#xE84E;</i>
							<span>Gestión Indicadors</span></a>

					</div>
				</div>
			</div>
			</div>
		<div class="table-responsive">
			
			<div class="table-wrapper">
			

				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>id</th>
							<th>codigo</th>
							<th>nombre</th>
							<th>objetivo</th>
							<th>alcance</th>
							<th>formula</th>
							<th>fkIdTipoIndicador</th>
							<th>fkIdUnidadMedicion</th>
							<th>meta</th>
							<th>fkIdSentido</th>
							<th>fkIdFrecuencia</th>
							<th>fkIdArticulo</th>
							<th>fkIdLiteral</th>
							<th>fkIdNumeral</th>
							<th>fkIdParagrafo</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						for ($i = 0; $i < count($arregloIndicadors); $i++) {
							?>
							<tr>
								<td>
									<span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="options[]" value="1">
										<label for="checkbox1"></label>
									</span>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getId(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getCodigo(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getNombre(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getObjetivo(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getAlcance(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getFormula(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getFkIdTipoIndicador(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getFkIdUnidadMedicion(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getMeta(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getFkIdSentido(); ?>
								</td>								
								<td>
									<?php echo $arregloIndicadors[$i]->getFkIdFrecuencia(); ?>
								</td>
								
								<td>
									<?php echo $arregloIndicadors[$i]->getFkIdArticulo(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getFkIdLiteral(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getFkIdNumeral(); ?>
								</td>
								<td>
									<?php echo $arregloIndicadors[$i]->getFkIdParagrafo(); ?>
								</td>

								<td>
									<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons"
											data-toggle="tooltip" title="Edit">&#xE254;</i></a>
									<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
											class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
	<div id="crudModal" class="modal fade" >
		<div class="modal-dialog">
			<div class="modal-content" >
				<form action="vistaIndicador.php" method="post">
					<div class="modal-header">
						<h4 class="modal-title">Indicador</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

						<div class="container">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item" style="radius:5px">
									<a class="nav-link active" data-toggle="tab" href="#home">Datos indicador</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu1">Representación visual por
										indicador</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu2">Fuentes por indicador</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu3">Variables por indicador</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu4">Responsables por indicador</a>
								</li>								
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div id="home" class="container tab-pane active"><br>
									
									<div class="row">
										
											<div class="form-group col-md-4" >
											<label>Id</label>
												<input type="id" id="txtId" name="txtId" class="form-control"
												value="<?php echo $id ?>" style="border-radius:10px">
											</div>
											<div class="form-group col-md-4">
												<label>Codigo</label>
												<input type="text" id="txtCodigo" name="txtCodigo" class="form-control"
													value="<?php echo $codigo ?>" style="border-radius:10px">
											</div>
											<div class="form-group col-md-4">
												<label>nombre</label>
												<input type="id" id="txtNombre" name="txtNombre" class="form-control"
													value="<?php echo $nombre ?>" style="border-radius:10px">
											</div>
										
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label>objetivo</label>
											<input type="id" id="txtObjetivo" name="txtObjetivo"
												class="form-control" value="<?php echo $objetivo ?>" style="border-radius:10px">
										</div>
										<div class="form-group col-md-6">
											<label>alcance</label>
											<input type="id" id="txtAlcance" name="txtAlcance" class="form-control"
												value="<?php echo $alcance ?>" style="border-radius:10px">
										</div>
									</div>
									<div class="row">																				
											<div class="form-group col-md-6">
												<label>formula</label>
												<input type="id" id="txtFormula" name="txtFormula" class="form-control"
													value="<?php echo $formula ?>" style="border-radius:10px">
											</div>
											<div class="form-group col-md-6">
												<label>meta</label>
												<input type="id" id="txtMeta" name="txtMeta" class="form-control"
													value="<?php echo $meta ?>" style="border-radius:10px">
											</div>										
									</div>
									<div class="row">										
										<div class="form-group col-md-3">
											<label for="combobox9">Tipo Indicador</label>
											<select class="form-control" id="combobox9" name="combobox9" style="border-radius:10px">
											<?php for ($i = 0; $i < count($arregloTipoIndicador); $i++) { ?>
												<option
													value="<?php echo $arregloTipoIndicador[$i]->getId() . ";" . $arregloTipoIndicador[$i]->getNombre(); ?>">
													<?php echo $arregloTipoIndicador[$i]->getId() . ";" .$arregloTipoIndicador[$i]->getNombre(); ?>
												</option>
											<?php } ?>
										</select>
										</div>
										<div class="form-group col-md-3">
											<label for="combobox0">Unidad de Medicion</label>
											<select class="form-control" id="combobox0" name="combobox0" style="border-radius:10px">
											<?php for ($i = 0; $i < count($arregloUnidadMedicion); $i++) { ?>
												<option
													value="<?php echo $arregloUnidadMedicion[$i]->getId() . ";" . $arregloUnidadMedicion[$i]->getDescripcion(); ?>">
													<?php echo $arregloUnidadMedicion[$i]->getId() . ";" .$arregloUnidadMedicion[$i]->getDescripcion(); ?>
												</option>
											<?php } ?>
										</select>
										</div>																												
										<div class="form-group col-md-3">
											<label for="combobox8">Sentido</label>
											<select class="form-control" id="combobox8" name="combobox8" style="border-radius:10px">
											<?php for ($i = 0; $i < count($arregloSentido); $i++) { ?>
												<option
													value="<?php echo $arregloSentido[$i]->getId() . ";" . $arregloSentido[$i]->getNombre(); ?>">
													<?php echo $arregloSentido[$i]->getId() . ";" .$arregloSentido[$i]->getNombre(); ?>
												</option>
											<?php } ?>
										</select>
										</div>
										<div class="form-group col-md-3">
											<label>Frecuencia</label>
											<input type="id" id="txtfkIdFrecuencia" name="txtfkIdFrecuencia"
												class="form-control" value="<?php echo $fkIdFrecuencia?>" placeholder="Frecuencia" style="border-radius:10px">
										</div>
										<div class="form-group col-md-3">
											<label for="combobox4">Articulo</label>
											<select class="form-control" id="combobox4" name="combobox4">
											<?php for ($i = 0; $i < count($arregloArticulo); $i++) { ?>
												<option
													value="<?php echo $arregloArticulo[$i]->getId() . ";" . $arregloArticulo[$i]->getNombre(); ?>">
													<?php echo $arregloArticulo[$i]->getId() . ";" . $arregloArticulo[$i]->getNombre(); ?>
												</option>
											<?php } ?>
											</select>											
										</div>
										<div class="form-group col-md-3">
											<label for="combobox5">Literal</label>
												<select class="form-control" id="combobox5" name="combobox5">
												<?php for ($i = 0; $i < count($arregloLiteral); $i++) { ?>
													<option
														value="<?php echo $arregloLiteral[$i]->getId() . ";" . $arregloLiteral[$i]->getDescripcion(); ?>">
														<?php echo $arregloLiteral[$i]->getId() . ";" . $arregloLiteral[$i]->getDescripcion(); ?>
													</option>
												<?php } ?>
											</select>											
										</div>
										<div class="form-group col-md-3">
											<label for="combobox6">Numeral</label>
												<select class="form-control" id="combobox6" name="combobox6">
												<?php for ($i = 0; $i < count($arregloNumeral); $i++) { ?>
													<option
														value="<?php echo $arregloNumeral[$i]->getId() . ";" . $arregloNumeral[$i]->getDescripcion(); ?>">
														<?php echo $arregloNumeral[$i]->getId() . ";" . $arregloNumeral[$i]->getDescripcion(); ?>
													</option>
												<?php } ?>
											</select>											
										</div>
										<div class="form-group col-md-3">
											<label for="combobox7">Paragrafo</label>
												<select class="form-control" id="combobox7" name="combobox7">
												<?php for ($i = 0; $i < count($arregloParagrafo); $i++ ){ ?>
													<option
														value="<?php echo $arregloParagrafo[$i]->getId() . ";" . $arregloParagrafo[$i]->getDescripcion(); ?>">
														<?php echo $arregloParagrafo[$i]->getId() . ";" . $arregloParagrafo[$i]->getDescripcion(); ?>
													</option>
												<?php } ?>
											</select>											
										</div>										
									</div>
									<div class="form-group">
										<input type="submit" id="btnGuardar" name="bt" class="btn btn-success"
											value="Guardar">
										<input type="submit" id="btnConsultar" name="bt" class="btn btn-success"
											value="Consultar">
										<input type="submit" id="btnModificar" name="bt" class="btn btn-warning"
											value="Modificar">
										<input type="submit" id="btnBorrar" name="bt" class="btn btn-warning"
											value="Borrar">
									</div>
								</div>
								<div id="menu1" class="container tab-pane fade"><br>
									<div class="container">
										<div class="form-group">
											<label for="combobox1">Todos los represenVisual</label>
											<select class="form-control" id="combobox1" name="combobox1">
												<?php for ($i = 0; $i < count($arregloRepresenVisuals); $i++) { ?>
													<option
														value="<?php echo $arregloRepresenVisuals[$i]->getId() . ";" . $arregloRepresenVisuals[$i]->getNombre(); ?>">
														<?php echo $arregloRepresenVisuals[$i]->getId() . ";" . $arregloRepresenVisuals[$i]->getNombre(); ?>
													</option>
												<?php } ?>
											</select>
											<br>
											<label for="listbox1">RepresenVisual específicos del Indicador</label>
											<select multiple class="form-control" id="listbox1" name="listbox1[]">

											</select>
										</div>
										<div class="form-group">
											<button type="button" id="btnAgregarItem" name="bt" class="btn btn-success"
												onclick="agregarItem('combobox1', 'listbox1')">Agregar Item</button>
											<button type="button" id="btnRemoverItem" name="bt" class="btn btn-success"
												onclick="removerItem('listbox1')">Remover Item</button>
										</div>
									</div>
								</div>
								<div id="menu2" class="container tab-pane fade"><br>
									<div class="container">
										<div class="form-group">
											<label for="combobox2">Todas las fuentes</label>
											<select class="form-control" id="combobox2" name="combobox2">
												<?php for ($i = 0; $i < count($arregloFuentes); $i++) { ?>
													<option
														value="<?php echo $arregloFuentes[$i]->getId() . ";" . $arregloFuentes[$i]->getNombre(); ?>">
														<?php echo $arregloFuentes[$i]->getId() . ";" . $arregloFuentes[$i]->getNombre(); ?>
													</option>
												<?php } ?>
											</select>
											<br>
											<label for="listbox2">Fuentes específicas del Indicador</label>
											<select multiple class="form-control" id="listbox2" name="listbox2[]">

											</select>
										</div>
										<div class="form-group">
											<button type="button" id="btnAgregarItem" name="bt" class="btn btn-success"
												onclick="agregarItem('combobox2', 'listbox2')">Agregar Item</button>
											<button type="button" id="btnRemoverItem" name="bt" class="btn btn-success"
												onclick="removerItem('listbox2')">Remover Item</button>
										</div>
									</div>
								</div>
								<div id="menu3" class="container tab-pane fade"><br>
									<div class="container">
										<div class="form-group">
											<label for="combobox3">Todas las variables</label>
											<select class="form-control" id="combobox3" name="combobox3">
												<?php for ($i = 0; $i < count($arregloVariables); $i++) { ?>
													<option
														value="<?php echo $arregloVariables[$i]->getId() . ";" . $arregloVariables[$i]->getNombre(); ?>">
														<?php echo $arregloVariables[$i]->getId() . ";" . $arregloVariables[$i]->getNombre(); ?>
													</option>
												<?php } ?>
											</select>
											<br>
											<label for="listbox3">Variables específicas del Indicador</label>
											<select multiple class="form-control" id="listbox3" name="listbox3[]">

											</select>
										</div>
										<div class="form-group">
											<button type="button" id="btnAgregarItem" name="bt" class="btn btn-success"
												onclick="agregarItem('combobox3', 'listbox3')">Agregar Item</button>
											<button type="button" id="btnRemoverItem" name="bt" class="btn btn-success"
												onclick="removerItem('listbox3')">Remover Item</button>
										</div>
									</div>
								</div>
								<!-- Se agrega la cuarta tab, con dos combobox, el primero para actor y el segundo para tipoactor-->
								<div id="menu4" class="container tab-pane fade"><br>
									<!--Container para actor-->
									<div class="container">						
										<div class="form-group">
											<label for="combobox10">Todos los actores</label>
											<select class="form-control" id="combobox10" name="combobox10">
												<?php for ($i = 0; $i < count($arregloActors); $i++) { ?>
													<option
														value="<?php echo $arregloActors[$i]->getId() . ";" . $arregloActors[$i]->getNombre(); ?>">
														<?php echo $arregloActors[$i]->getId() . ";" . $arregloActors[$i]->getNombre(); ?>
													</option>
												<?php } ?>
											</select>
											<br>
											<label for="listbox10">Actores especificos del Indicador</label>
											<select multiple class="form-control" id="listbox10" name="listbox10[]">

											</select>
										</div>
										<div class="form-group">
											<button type="button" id="btnAgregarItem" name="bt" class="btn btn-success"
												onclick="agregarItem('combobox10', 'listbox10')">Agregar Item</button>
											<button type="button" id="btnRemoverItem" name="bt" class="btn btn-success"
												onclick="removerItem('listbox10')">Remover Item</button>
										</div>										
									</div>
									<!--Container para tipoActor-->
									<div class="container">						
										<div class="form-group">
											<label for="combobox11">Todos los tipos de actor</label>
											<select class="form-control" id="combobox11" name="combobox11">
												<?php for ($i = 0; $i < count($arregloTipoActors); $i++) { ?>
													<option
														value="<?php echo $arregloTipoActors[$i]->getId() . ";" . $arregloTipoActors[$i]->getNombre(); ?>">
														<?php echo $arregloTipoActors[$i]->getId() . ";" . $arregloTipoActors[$i]->getNombre(); ?>
													</option>
												<?php } ?>
											</select>
											<br>
											<label for="listbox11">Tipos de actores especificos del Indicador</label>
											<select multiple class="form-control" id="listbox11" name="listbox11[]">

											</select>
										</div>
										<div class="form-group">
											<button type="button" id="btnAgregarItem" name="bt" class="btn btn-success"
												onclick="agregarItem('combobox11', 'listbox11')">Agregar Item</button>
											<button type="button" id="btnRemoverItem" name="bt" class="btn btn-success"
												onclick="removerItem('listbox11')">Remover Item</button>
										</div>										
									</div>
								</div>


							</div>


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