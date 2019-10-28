<?php
session_start();
if (!$_SESSION['login']) {
  header('Location: '.ROOT_URL.'/view/LoginVista.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar historia</title>
  <link rel="stylesheet" href="../assets/styles/HistoriaClinica.css">
  <link rel="stylesheet" href="../assets/styles/Menu.css">
</head>
<body>
  <?php
  include 'MenuVista.php';
  require('../config/configuracion.php');
  require('../config/Conexion.php');
  use BD\Conexion;
  $conexion = Conexion::obtenerConexion();
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  if (!$id) {
    header('Location: '.ROOT_URL.'/view/ErrorVista.php?error=Error, el id es incorrecto');
    die();
  }
  $query = "SELECT * FROM historia WHERE id = :id;";
  $statement = $conexion->prepare($query);
  $statement->execute(['id' => $id]);
  $response = $statement->fetch();
  if (!$response) {
    header('Location: '.ROOT_URL.'/view/ErrorVista.php?error=Error, el usuario no existe');
    die();
  }
  ?>
  <div id="editar">
    <center>
      <h1>Editar Historia Clínica</h1>
    </center>
    <center>
      <div id="container-header">
        <h1 id="titulo">Historia Clínica</h1>
        <img src="../assets/img/logo.jpg" alt="Logo clínica" id="logo">
      </div>
    </center>
    <form action="../controllers/EditarHistoriaControlador.php" method="post" id="form-historia">
      <center id="uno">
        <h3>Ficha de identificación</h3>
      </center>
      <input type="hidden" name="id" id="id" value="<?php echo $response['id'];?>">
      <div class="azul" id="dos">
        <label for="fecha_elaboracion">Fecha de elaboración:</label>
        <input type="date" name="fecha_elaboracion" id="fecha_elaboracion" value="<?php echo $response['fecha_elaboracion'];?>">
      </div>
      <div id="tres">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" maxlength="100" value="<?php echo $response['nombre'];?>">
      </div>
      <div id="cuatro">
        <label for="genero">Género:</label>
        <select name="genero" id="genero">
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
        </select>
        <!-- <input type="text" name="genero" id="genero" maxlength="1" value="<?php echo $response['genero'];?>"> -->
      </div>
      <div id="cinco">
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" min="0" value="<?php echo $response['edad'];?>">
      </div>
      <div class="azul" id="seis">
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $response['fecha_nacimiento'];?>">
      </div>
      <div id="siete" class="azul">
        <label for="ocupacion">Ocupación:</label>
        <input type="text" name="ocupacion" id="ocupacion" maxlength="100" value="<?php echo $response['ocupacion'];?>">
      </div>
      <div id="ocho" class="azul">
        <label for="lateralidad">Lateralidad</label>
        <input type="text" name="lateralidad" id="lateralidad" maxlength="50" value="<?php echo $response['lateralidad'];?>">
      </div>
      <div id="nueve">
        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" name="nacionalidad" id="nacionalidad" maxlength="50" value="<?php echo $response['nacionalidad'];?>">
      </div>
      <div id="diez">
        <label for="religion">Religión:</label>
        <input type="text" name="religion" id="religion" maxlength="50" value="<?php echo $response['religion'];?>">
      </div>
      <div id="once">
        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" id="telefono" maxlength="10" value="<?php echo $response['telefono'];?>">
      </div>
      <div class="azul" id="doce">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" maxlength="50" value="<?php echo $response['email'];?>">
      </div>
      <div id="trece">
        <label for="domicilio">Domicilio:</label>
        <input type="text" name="domicilio" id="domicilio" maxlength="150" value="<?php echo $response['domicilio'];?>">
      </div>
      <div id="catorce">
        <label for="telefono_emergencia">Teléfono de emergencia:</label>
        <input type="tel" name="telefono_emergencia" id="telefono_emergencia" maxlength="10" value="<?php echo $response['telefono_emergencia'];?>">
      </div>
      <div class="azul" id="quince">
        <label for="persona_emergencia">Persona a quien contactar en caso de emergencia:</label>
        <input type="text" name="persona_emergencia" id="persona_emergencia" maxlength="100" value="<?php echo $response['persona_emergencia'];?>">
      </div>
      <?php
      if (isset($_SESSION['role']) && $_SESSION['role'] == "Administrador") {
        echo '<input type="submit" value="Guardar" id="guardar">';
      }
      ?>
    </form>
  </div>
</body>
</html>