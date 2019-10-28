<?php
require('../config/Conexion.php');
require('../config/configuracion.php');
use BD\Conexion;
$data['username'] = $_POST['username'];
$password = $_POST['password'];
try {
  $conexion = Conexion::obtenerConexion();
  $query = "SELECT * FROM usuarios WHERE username = :username";
  $statement = $conexion->prepare($query);
  if ($statement->execute($data)) {
    $response = $statement->fetch();
    if ($response['password'] == $password) {
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['role'] = $response['rol'];
      $_SESSION['username'] = $response['username'];
      header('Location: '.ROOT_URL.'/view/MostrarHistoriasVista.php');
    } else {
      header('Location: '.ROOT_URL.'/view/LoginVista.php');
    }
  } else {
    header('Location: '.ROOT_URL.'/view/ErrorVista.php?error=Error, no se pudo realizar la actualización');
  }
} catch(\Exception $ex) {
  header('Location: '.ROOT_URL.'/view/ErrorVista.php?error='.$ex->getMessage());
  die();
}
?>