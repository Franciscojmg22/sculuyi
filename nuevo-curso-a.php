<?php
session_start();
require 'connection.php';
$maestro = 0;

if (!$maestro) {
    $query = "SELECT * FROM cur_alu WHERE id_cur = :idCur AND id_alum = :idAlu";
    //}

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':idCur', $_GET['idCur']);
    $stmt->bindParam(':idAlu', $_GET['idAlu']);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        $query = "INSERT INTO cur_alu (id_cur, id_alum) VALUES (:idCur, :idAlu)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idCur', $_GET['idCur']);
        $stmt->bindParam(':idAlu', $_GET['idAlu']);
        $stmt->execute();
    }


}


header('Location: cursos.php')
    ?>