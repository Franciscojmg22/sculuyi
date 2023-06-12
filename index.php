<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: ./home.php');
}

require 'connection.php';

if (!empty($_POST['correo']) && !empty($_POST['contrasena'])) {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Verificar en la tabla de alumnos
    $alumnos_query = $conn->prepare('SELECT id, nombre, correo, contrasena FROM alumnos WHERE correo = :correo');
    $alumnos_query->bindParam(':correo', $correo);
    $alumnos_query->execute();
    $alumno = $alumnos_query->fetch(PDO::FETCH_ASSOC);

    // Verificar en la tabla de maestros si no se encontró en la tabla de alumnos
    if (!$alumno) {
        $maestros_query = $conn->prepare('SELECT id, nombre, correo, contrasena FROM maestros WHERE correo = :correo');
        $maestros_query->bindParam(':correo', $correo);
        $maestros_query->execute();
        $maestro = $maestros_query->fetch(PDO::FETCH_ASSOC);

        if ($maestro && password_verify($contrasena, $maestro['contrasena'])) {
            $_SESSION['user_id'] = $maestro['id'];
            $_SESSION['maestro'] = '1';
            $_SESSION['user_id'] = $maestro['nombre'];
            header('Location: ./home.php');
        } else {
            $message = 'Invalid email or password. Please try again.';
        }
    } else {
        if (password_verify($contrasena, $alumno['contrasena'])) {
            $_SESSION['user_id'] = $alumno['id'];
            $_SESSION['nombre'] = $alumno['nombre'];
            header('Location: ./home.php');
        } else {
            $message = 'Invalid email or password. Please try again.';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In to an Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tilt+Prism&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/elements.css">
</head>
<body>
<?php require_once('./components/header.php') ?>
<main>
  <div id="mainContainerLogin" class="mainContainerLogin">
    <div class="loginBox">
      <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
      <?php endif; ?>

      <h1>Log In Please</h1>

      <form action="./index.php" method="post">
        <input type="correo" name="correo" placeholder="Enter Your Email...">
        <input type="contrasena" name="contrasena" placeholder="Enter Your Password...">
        <input type="submit" value="Login">
      </form>
      <span> New User? - <a href="registro.php">Sign Up</a></span>
    </div>
  </div>
</main>
<?php require_once('./components/footer.php') ?>

</body>
</html>