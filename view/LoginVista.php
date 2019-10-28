<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="../assets/styles/Login.css">
</head>
<body>
  <div id="container-login">
    <form method="post" id="form-login" action="../controllers/LoginControlador.php">
      <div>
        <h1>Iniciar sesión</h1>
      </div>
      <div>
        <input type="text" name="username" id="username" placeholder="Usuario" required>
      </div>
      <div>
        <input type="password" name="password" id="password" placeholder="Contraseña" required>
      </div>
      <div id="div_submit">
        <input type="submit" value="Ingresar" id="submit">
      </div>
    </form>
  </div>
</body>
</html>
