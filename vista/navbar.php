<!DOCTYPE html>
<html lang="en">
<body>
<!--Se agrega una barra de navegación para acceder a los CRUDs, y agregar la funcionalidad "buscar"-->
<div class="menu">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/ProyectoIndicadores1_Trabajo/vista">Home/Vistas <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Reload</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CRUDs
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		    <a class="dropdown-item" href="vistaTipoIndicador.php">Tipo indicador</a>
          <a class="dropdown-item" href="vistaUnidadMedicion.php">Unidad de medición</a>
		      <a class="dropdown-item" href="vistaSentido.php">Sentido</a>
          <a class="dropdown-item" href="vistaTipoActor.php">Tipo actor</a>
		      <a class="dropdown-item" href="vistaRepresenVisual.php">Repre. visual</a>
          <a class="dropdown-item" href="vistaFuente.php">Fuente</a>
          <a class="dropdown-item" href="vistaResultadoIndicador.php">Resultado indicador</a>
          <a class="dropdown-item" href="vistaVariable.php">Variable</a>
          <a class="dropdown-item" href="vistaActor.php">Actor</a>
          <a class="dropdown-item" href="vistaIndicador.php">Indicador</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="vistaUsuarios.php">Usuario</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Borrar">Search</button> <!--No esta cogiendo el value-->
    </form>
  </div>
</nav>
</div>
