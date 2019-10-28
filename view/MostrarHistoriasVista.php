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
  <title>Historias Clínicas</title>
  <link rel="stylesheet" href="../assets/styles/HistoriaClinica.css">
  <link rel="stylesheet" href="../assets/styles/Menu.css">
</head>
<body>
  <?php include 'MenuVista.php';?>
  <div id="historias">
    <h1 id="titulo_lista">Historias Clínicas</h1>
    <div id="buscador">
      <form action="MostrarHistoriasVista.php" method="get">
        <input type="text" name="param" id="param" placeholder="Búsqueda rápida">
        <input type="submit" value="Buscar" id="submit_buscar">
      </form>
    </div>
    <table id="tabla_historias">
      <thead>
        <tr>
          <th>Fecha de elaboración</th>
          <th>Nombre</th>
          <th>Fecha de nacimiento</th>
          <th>Teléfono</th>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        require('../config/Conexion.php');
        require('../config/configuracion.php');
        use BD\Conexion;
        $conexion = Conexion::obtenerConexion();
        $param = isset($_GET['param']) ? $_GET['param'] : null;
        $query = "SELECT * FROM historia";
        if ($param) {
          $query .= " WHERE nombre LIKE :param";
        }
        $statement = $conexion->prepare($query);
        if ($param) {
          $statement->execute(['param' => '%'.$param.'%']);
        } else {
          $statement->execute();
        }
        while  ($response = $statement->fetch()) {
          echo "<tr>
              <td>".$response['fecha_elaboracion']."</td>
              <td>".$response['nombre']."</td>
              <td>".$response['fecha_nacimiento']."</td>
              <td>".$response['telefono']."</td>
              <td>".$response['email']."</td>";
          if (isset($_SESSION['role']) && $_SESSION['role'] == "Administrador") {
            echo "<td><a href=\"EditarHistoriaVista.php?id=".$response['id']."\"><button id=\"editar_button\">Editar</button></a>
              <a href=\"EliminarHistoriaVista.php?id=".$response['id']."\"><button id=\"borrar_button\">Eliminar</button></a></td>";
          } else {
            echo "<td><a href=\"EditarHistoriaVista.php?id=".$response['id']."\"><button id=\"editar_button\">Ver</button></a></td>";
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>