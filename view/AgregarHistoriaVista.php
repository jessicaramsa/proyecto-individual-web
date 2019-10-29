<?php
session_start();
require('../config/configuracion.php');
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
  <title>Agregar historia clínica</title>
  <link rel="stylesheet" href="../assets/styles/HistoriaClinica.css">
  <link rel="stylesheet" href="../assets/styles/Menu.css">
</head>
<body>
  <?php include 'MenuVista.php';?>
  <center>
    <div id="container-header">
      <h1 id="titulo">Historia Clínica</h1>
      <img src="../assets/img/logo.jpg" alt="Logo clínica" id="logo">
    </div>
  </center>
  <div class="container">
    <form action="../controllers/AgregarHistoriaControlador.php" method="post" id="form-historia">
      <center id="uno">
        <h3>Ficha de identificación</h3>
      </center>
      <div class="azul" id="dos">
        <label for="fecha_elaboracion">Fecha de elaboración:</label>
        <input type="date" name="fecha_elaboracion" id="fecha_elaboracion">
      </div>
      <div id="tres">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" maxlength="100">
      </div>
      <div id="cuatro">
        <label for="genero">Género:</label>
        <select name="genero" id="genero">
          <option value="" disabled selected>Selecciona tu género</option>
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
        </select>
      </div>
      <div id="cinco">
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" min="0">
      </div>
      <div class="azul" id="seis">
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
      </div>
      <div id="siete" class="azul">
        <label for="ocupacion">Ocupación:</label>
        <input type="text" name="ocupacion" id="ocupacion" maxlength="100">
      </div>
      <div id="ocho" class="azul">
        <label for="lateralidad">Lateralidad</label>
        <input type="text" name="lateralidad" id="lateralidad" maxlength="50">
      </div>
      <div id="nueve">
        <label for="nacionalidad">Nacionalidad:</label>
        <input type="text" name="nacionalidad" id="nacionalidad" maxlength="50">
      </div>
      <div id="diez">
        <label for="religion">Religión:</label>
        <input type="text" name="religion" id="religion" maxlength="50">
      </div>
      <div id="once">
        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" id="telefono" maxlength="10">
      </div>
      <div class="azul" id="doce">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" maxlength="50">
      </div>
      <div id="trece">
        <label for="domicilio">Domicilio:</label>
        <input type="text" name="domicilio" id="domicilio" maxlength="150">
      </div>
      <div id="catorce">
        <label for="telefono_emergencia">Teléfono de emergencia:</label>
        <input type="tel" name="telefono_emergencia" id="telefono_emergencia" maxlength="10">
      </div>
      <div class="azul" id="quince">
        <label for="persona_emergencia">Persona a quien contactar en caso de emergencia:</label>
        <input type="text" name="persona_emergencia" id="persona_emergencia" maxlength="100">
      </div>
      <input type="submit" value="Guardar" id="guardar">
    </form>
  </div>
</body>
</html>