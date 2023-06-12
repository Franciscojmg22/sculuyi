<?php
session_start();
require 'connection.php';

if (isset($_SESSION['user_id'])) {
    $query = "SELECT * FROM maestros";
    $registro = $conn->prepare($query);
    $registro->execute();
}


?>
<?php require_once('./components/header.php') ?>

<link rel="stylesheet" href="./css/maestros.css">
<main>
    <div id="mainContainer" class="mainContainer">
        <h1 class="tittle">Conoce a nuestros maestros
            <i class="bi bi-laptop-fill"></i>
        </h1>
        <div class="contenedor">

            <!-- carta bde contacto de Paco -->
            <?php while (($resultado = $registro->fetch(PDO::FETCH_ASSOC))): ?>

                <div class="card">
                    <figure>
                        <img src="./visuales/John.jpg" class="img-paco">
                    </figure>
                    <div class="contenido">
                        <h3><?php echo $resultado['nombre']?> </h3>
                        <p><?php echo $resultado['descripcion']?></p>
                    </div>
                </div>
            <?php endwhile; ?>

            <!-- Carta de contacto de Cabal-->
        </div>
    </div>
</main>


<?php require_once('./components/footer.php') ?>