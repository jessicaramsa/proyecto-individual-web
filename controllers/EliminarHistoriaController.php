<?php
require('../config/configuracion.php');
require('../config/Conexion.php');
session_start();
if ($_SESSION['role'] != "Administrador") {
  header('Location: '.ROOT_URL.'/view/MostrarHistoriasVista.php');
}
use BD\Conexion;
$data['id'] = $_POST['id'];
try {
  $conexion = Conexion::obtenerConexion();
  $query = "DELETE FROM historia WHERE id = :id";
  $statement = $conexion->prepare($query);
  if ($statement->execute($data)) {
    header('Location: '.ROOT_URL.'/view/MostrarHistoriasVista.php');
  } else {
    header('Location: '.ROOT_URL.'/view/ErrorVista.php?error=Error, no se pudo realizar la eliminación');
  }
} catch(\Exception $ex) {
  header('Location: '.ROOT_URL.'/view/ErrorVista.php?error=Error, no se pudo realizar la actualización');
}
?>