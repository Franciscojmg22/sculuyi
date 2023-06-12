<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/elements.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geologica:wght@100;200;300;400;500;600;700&family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div id="sidebar" class="sidebar">
        <div class="sideMenu">
            <h1>Menú de navegación</h1>
        </div>
        <div id="sd" class="sideLista">
            <div id="home" class="row">
                <i id="home" class="fas bi-search" style="margin-inline-end: 3px;"></i>
                Home
            </div>
            <div id="cursos" class="row">
                <i id="cursos" class="fas bi-search" style="margin-inline-end: 3px;"></i>
                Courses
            </div>
            <div id="maestros" class="row">
                <i id="maestros" class="fas bi-search" style="margin-inline-end: 3px;"></i>
                Teachers
            </div>
            <div id="acerca" class="row">
                <i id="acerca" class="fas bi-search" style="margin-inline-end: 3px;"></i>
                About us
            </div>
            <div id="contacto" class="row">
                <i id="contacto" class="fas bi-search" style="margin-inline-end: 3px;"></i>
                Constact us
            </div>
        </div>
        <div id="logout" class="divLogout">
            <button id="logout" class="btnLogout">
                Log Out
            </button>
        </div>
    </div>

    <header id="header" class="header">
        <div class="headerDiv" style="justify-content: start;">
            <div id="menu" class="menu hover">
                <i class="bi bi-list"></i>
                <p>Sculuyi</p>
            </div>
        </div>
        <div class="headerDiv" style="justify-content: center; width: 34%">
            <div class="busqueda hover">
                <i class="fas bi-search" style="margin-inline-end: 3px;"></i>
                <input type="text" placeholder="Your Name">
            </div>


        </div>

        <div class="headerDiv" style="justify-content: end;">
            <div class="usuario hover">
                <div class="nombreUsuario">
                    <p>
                        <?php if (isset($_SESSION['nombre'])): ?>
                        <p>
                            <?php echo 'nom: ' . $_SESSION['nombre']; ?>
                        </p>
                    <?php else: ?>
                        <p>Nombre Usuario</p>
                    <?php endif; ?>

                    </p>
                </div>
                <div class="icoContainer">
                    <img src="./partials/1.jpg" alt="">
                </div>
            </div>


        </div>

    </header>