<?php  session_start()?>
<?php require_once('./components/header.php')?>

<!-- link a la hoja de estilos par ahcer las cartas -->
        <link rel="stylesheet" href="./css/contactcard.css">
        
       <!--  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->
        <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"></link>
    <main>

        <div id="mainContainer" class="mainContainer">
                    <h1 class="tittle">Ponte en contacto con nosotros </h1>
            <div class="contenedor"> 

                    <!-- carta bde contacto de Paco -->
                            <div class="card">
                    <figure>
                        <img src="./visuales/pic_paco.jpg" class="img-paco" >
                    </figure>
                    <div class="contenido">
                        <h3>Francisco de Jesús Martínez González </h3>
                        <p>¿Qué tal?, soy Paco un chico al cual le gusta realizar programas como hobbie 
                            y trabajo de ello si quieres algún consejo mandame un mensaje
                        </p>
                        <a href="" class="face">
                        <i class="bi bi-facebook"></i>
                        </a>
                        
                    </div>
                </div>

                    <!-- Carta de contacto de Cabal-->
                    
                <div class="card">
                    <figure>
                        <img src="./visuales/pic_cabal.jpg" class="img-cabal" >
                    </figure>
                    <div class="contenido">
                        <h3>José Edaurdo Cabal Páramo  </h3>
                        <p>Hola, tengo 21 años y me gusta mucho realizar programación web, domino JavaScript,
                            Html, Css, PHP si tienes alguna sobre alguna función
                            contactate conmigo
                        </p>
                        <a href="https://www.facebook.com/jose.cabal.58" class="face">
                        <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/jose_cabal15/" class="face">
                            <i class="bi bi-instagram">  </i>
                            </a>
                    </div>
                </div>

                    <!--Carta de contacto de Jashi -->

                <div class="card">
                    <figure>
                        <img src="./visuales/pic_jashi.jpg" class="img-jashi" >
                    </figure>
                    <div class="contenido">
                        <h3>Jashiel Robles Lecona </h3>
                        <p>Soy un jovén de 20 años al cual le encanta la programación,
                        procuro siempre estar al dia con los nuevos frameworks y
                        si quieres algún consejo sobre frameworks no dudes en contactarte conmigo
                        </p>
                        <a href="https://www.facebook.com/Jashi.RL/" class="face">
                        <i class="bi bi-facebook"></i>
                        </a>    
                        
                        <a href="https://www.youtube.com/watch?v=vFIyR9YbME0" class="face">
                            <i class="bi bi-youtube" class="you"></i>
                        </a> 
                    </div>
                </div>
            </div>
        </div>


    </main>


<?php require_once('./components/footer.php')?>