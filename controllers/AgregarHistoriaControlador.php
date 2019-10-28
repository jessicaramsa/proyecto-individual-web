<?php
require('../config/configuracion.php');
require('../config/Conexion.php');
session_start();
if ($_SESSION['login']) {
  header('Location: '.ROOT_URL.'/view/LoginVista.php');
}
use BD\Conexion;
$data = array(
  'fecha_elaboracion' => $_POST['fecha_elaboracion'],
  'nombre' => $_POST['nombre'],
  'genero' => $_POST['genero'],
  'edad' => $_POST['edad'],
  'fecha_nacimiento' => $_POST['fecha_nacimiento'],
  'ocupacion' => $_POST['ocupacion'],
  'lateralidad' => $_POST['lateralidad'],
  'nacionalidad' => $_POST['nacionalidad'],
  'religion' => $_POST['religion'],
  'telefono' => $_POST['telefono'],
  'email' => $_POST['email'],
  'domicilio' => $_POST['domicilio'],
  'telefono_emergencia' => $_POST['telefono_emergencia'],
  'persona_emergencia' => $_POST['persona_emergencia']
);
try {
  $conexion = Conexion::obtenerConexion();
  $campos = " (fecha_elaboracion, nombre, genero, edad, fecha_nacimiento, ocupacion, lateralidad,
    nacionalidad, religion, telefono, email, domicilio, telefono_emergencia, persona_emergencia) ";
  $datos = "(:fecha_elaboracion, :nombre, :genero, :edad, :fecha_nacimiento, :ocupacion, :lateralidad,
    :nacionalidad, :religion, :telefono, :email, :domicilio, :telefono_emergencia, :persona_emergencia)";
  $query = "INSERT INTO historia ".$campos." VALUES ".$datos.";";
  $statement = $conexion->prepare($query);
  if ($statement->execute($data)) {
    header('Location: '.ROOT_URL.'/view/MostrarHistoriasVista.php');
  } else {
    header('Location: '.ROOT_URL.'/view/ErrorVista.php?error=Error, no se pudo realizar la inserción');
  }
} catch(\Exception $ex) {
  header('Location: '.ROOT_URL.'/view/ErrorVista.php?error='.$ex->getMessage());
}