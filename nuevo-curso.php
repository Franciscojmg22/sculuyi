<?php
require 'connection.php'; 
$message = '';
if (!empty($_POST['nom_curs']) && !empty($_POST['descripcion'])) {
    $nom_curs = $_POST['nom_curs'];
    $descripcion = $_POST['descripcion'];
    $sql = "INSERT INTO curso (nom_curs, descripcion) VALUES (:nom_curs, :descripcion)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nom_curs', $nom_curs);
    $stmt->bindParam(':descripcion', $descripcion);
    if ($stmt->execute()) {
        $message = 'Curso creado exitosamente';
    } else {
        $message = 'Error al crear el curso';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear un nuevo curso</title>
</head>
<body>
<h1>Crear un nuevo curso</h1>

    <?php if (!empty($message)): ?>
<p><?= $message ?></p>
<?php endif; ?>

    <form action="crear_curso.php" method="post">
        <label for="nom_curs">Nombre del curso:</label>
        <input type="text" name="nom_curs" id="nom_curs" required>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
        <input type="submit" value="Crear curso">
    </form>
</body>
</html>