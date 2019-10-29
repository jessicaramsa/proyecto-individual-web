<?php
namespace BD;
use PDO;
class Conexion {
  public static function obtenerConexion() {
    return new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
  }
}