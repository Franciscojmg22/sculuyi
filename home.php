<?php
session_start();
require 'connection.php';

//if(isset($_SESSION['user_maestro'])){
if (isset($_SESSION['user_id'])) {
    if (isset($_SESSION['maestro'])) {
        $query = "SELECT maestros.nombre, curso.nom_curs, maestros.id
        FROM maestros 
        INNER JOIN cur_prof ON maestros.id = cur_prof.id_prof 
        INNER JOIN curso ON cur_prof.id_cur = curso.id 
        WHERE maestros.id = :id";
    } else {
        $query = "SELECT maestros.nombre, curso.nom_curs, cur_prof.id
            FROM alumnos 
            INNER JOIN cur_alu ON alumnos.id = cur_alu.id_alum 
            INNER JOIN cur_prof ON cur_alu.id_cur = cur_prof.id
            INNER JOIN maestros ON cur_prof.id_prof = maestros.id
            INNER JOIN curso ON cur_prof.id_cur = curso.id
            WHERE alumnos.id = :id";
    }
    $registro = $conn->prepare($query);
    $registro->bindParam(':id', $_SESSION['user_id']);
    $registro->execute();
}

//$resultado = $registro->fetch(PDO::FETCH_ASSOC);
//print_r($resultado);
?>

<?php require_once('./components/header.php') ?>
<main id="mainContainer">
    <div class="mainContainer grid">
        <?php while (($resultado = $registro->fetch(PDO::FETCH_ASSOC))): ?>

            <div class="item" curProfId="<?php echo $resultado['id'] ?>">
                <div class="itemImgContainer">
                    <?php echo $resultado['nom_curs'] ?>
                </div>
                <div class="itemInfContainer">
                    <!--  <p class="temNomCur"> nombre de curso:----- </p> -->
                    <p class="temProfesor">
                        <?php echo 'profesor: ' . $resultado['nombre'] ?>
                    </p>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</main>

<?php require_once('./components/footer.php') ?>

<style>
    .grid {
        width: 100%;
        max-height: fit-content;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(20vw, 20vw));
        grid-template-rows: repeat(auto-fit, minmax(20vh, 20vh));
        row-gap: 4vh;
    }

    .item {
        height: 20vh;
        width: 20vw;
        display: flex;
        flex-direction: column;
        transform: translateY(-3px);
        transform: translateX(3px);
        box-shadow: -3px 3px 10px rgba(0, 0, 0, 0.3);
    }

    .itemImgContainer {
        height: 13vh;
        min-height: 13vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: orange;
        color: white;
        font-size: larger;
        text-align: center;
    }

    .itemInfContainer {
        height: 7vh;
        min-height: 7vh;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
        background-color: white;
    }

    .itemInfContainer p {
        margin-block: 2px;
    }
</style>

<script>
    const main = document.getElementById('mainContainer')
    const elementoGrid = document.querySelector('.grid')
    const fragment = document.createDocumentFragment()



    const animacionGrid = () => {
        const vw = window.innerWidth / 100
        const mingap = 30
        let anchoGrid = elementoGrid.offsetWidth
        //let numCols = Math.floor(mingap + Math.sqrt(mingap*mingap + 4*((20*vw+mingap)*anchoGrid) ) / (2*mingap) ) 
        let numCols = Math.floor(anchoGrid / (vw * 20 + 30))
        let numGaps = numCols - 1
        let porcentajeCols = (numCols * 20 * vw * 100) / anchoGrid
        let gap = Math.floor((100 - porcentajeCols) / numGaps)

        elementoGrid.style.columnGap = gap + '%'

        setTimeout(() => {
            //console.log('ancho => ', elementoGrid.offsetWidth , ' @@ num cols ', numCols , 'porcentajecol', porcentajeCols , 'gap', gap)

            requestAnimationFrame(animacionGrid)
        },)

    }

    window.addEventListener('DOMContentLoaded', () => {
        requestAnimationFrame(animacionGrid)
    })




</script>