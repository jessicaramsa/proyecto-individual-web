<?php
require('../config/configuracion.php');
require('../config/Conexion.php');
session_start();
if ($_SESSION['login']) {
  header('Location: '.ROOT_URL.'/view/LoginVista.php');
}
use BD\Conexion;
$columns = array('fecha_elaboracion', 'nombre', 'genero', 'edad', 'fecha_nacimiento',
  'ocupacion', 'lateralidad', 'nacionalidad', 'religion', 'telefono', 'email',
  'domicilio', 'telefono_emergencia', 'persona_emergencia'
);
$data = [];
foreach($columns as $column) {
  $data[$column] = $_POST[$column];
}
$data['id'] = $_POST['id'];
try {
  $conexion = Conexion::obtenerConexion();
  $campos = "";
  $i = 0;
  foreach($columns as $column) {
    $campos .= $column." = :".$column.(($i < count($columns) - 1) ? ", " : "");
    $i++;
  }
  $query = "UPDATE historia SET $campos WHERE id = :id;";
  $statement = $conexion->prepare($query);
  if ($statement->execute($data)) {
    header('Location: '.ROOT_URL.'/view/MostrarHistoriasVista.php');
  } else {
    header('Location: '.ROOT_URL.'/view/ErrorVista.php?error=Error, no se pudo realizar la inserción');
  }
} catch(\Exception $ex) {
  header('Location: '.ROOT_URL.'/view/ErrorVista.php?error='.$ex->getMessage());
}
?>