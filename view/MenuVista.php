<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../assets/styles/Menu.css">
</head>
<body>
  <nav id="menu">
    <ul>
      <li>
        <a href="AgregarHistoriaVista.php">Nueva historia clínica</a>
      </li>
      <li>
        <a href="MostrarHistoriasVista.php">Historias</a>
      </li>
      <li>
        <a><?php echo $_SESSION['username'];?></a>
      </li>
      <li>
        <a href="SalirVista.php">Salir</a>
      </li>
    </ul>
  </nav>
</body>
</html>