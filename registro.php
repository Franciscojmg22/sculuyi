<?php 
require 'connection.php';
$message = '';

if (!empty($_POST['correo']) && !empty($_POST['contrasena']) && !empty($_POST['contrasenna'])) {
    if ($_POST['contrasena'] === $_POST['contrasenna']) {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $role = $_POST['role'];

        // Consulta SQL para buscar si el correo electrónico ya existe en la tabla "alumno"
        $check_correo_alumno_sql = "SELECT * FROM alumno WHERE correo = :correo";
        $check_correo_alumno_stmt = $conn->prepare($check_correo_alumno_sql);
        $check_correo_alumno_stmt->bindParam(':correo', $correo);
        $check_correo_alumno_stmt->execute();
        $alumno = $check_correo_alumno_stmt->fetch(PDO::FETCH_ASSOC);

        // Consulta SQL para buscar si el correo electrónico ya existe en la tabla "maestros"
        $check_correo_maestro_sql = "SELECT * FROM maestros WHERE correo = :correo";
        $check_correo_maestro_stmt = $conn->prepare($check_correo_maestro_sql);
        $check_correo_maestro_stmt->bindParam(':correo', $correo);
        $check_correo_maestro_stmt->execute();
        $maestro = $check_correo_maestro_stmt->fetch(PDO::FETCH_ASSOC);

        if ($alumno || $maestro) {
            // Si el correo electrónico ya existe en alguna tabla, muestra un mensaje de error
            $message = 'This email is already registered. Please use a different correo address.';
        } else {
            if ($role === 'alumnos') {
                // Insertar en la tabla "alumno"
                $sql = "INSERT INTO alumno (correo, password) VALUES (:correo, :password)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':correo', $correo);
                $newPass = password_hash($contrasena, PASSWORD_BCRYPT);
                $stmt->bindParam(':password', $newPass);
            } else {
                // Insertar en la tabla "maestros"
                $sql = "INSERT INTO maestros (correo, password) VALUES (:correo, :password)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':correo', $correo);
                $newPass = password_hash($contrasena, PASSWORD_BCRYPT);
                $stmt->bindParam(':password', $newPass);
            }

            if ($stmt->execute()) {
                $message = 'Successfully Created a New User';
            } else {
                $message = 'Sorry, Your User was not created';
            }
        }
    } else {
        $message = 'Passwords do not match';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register to an Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tilt+Prism&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<?php require_once('./components/header.php')?>
<main>
    <div id="mainContainer" class="mainContainer">
        <div class="registerBox">
            <?php if(!empty($message)): ?>
                <p><?= $message ?></p>
            <?php endif; ?>

            <h1>Sign Up Please</h1>
            <span> or <a href="login.php"> Log In</a></span>

            <form action="registro.php" method="post">
                <input type="correo" name="correo" placeholder="Enter Your Email...">
                <input type="contrasena" name="contrasena" placeholder="Enter Your Password...">
                <input type="contrasena" name="contrasenna" placeholder="Confirm Your Password...">
                <select name="role" id="role">
                    <option value="alumnos">Student</option>
                    <option value="maestros">Teacher</option>
                </select>
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</main>
<?php require_once('./components/footer.php') ?>

</body>
</html>