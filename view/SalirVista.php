<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Salir</title>
  <link rel="stylesheet" href="../assets/styles/template.css">
</head>
<body>
  <?php
  session_start();
  session_destroy();
  ?>
  <h1>Tu sesión ha terminado</h1>
  <a href='LoginVista.php'><button>Aceptar</button></a>
</body>
</html>