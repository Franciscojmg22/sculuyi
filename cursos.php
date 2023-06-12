<?php
session_start();
require 'connection.php';
$maestro = 1;
$idEje = 2;
//if(isset($_SESSION['user_id'])){

$arrayId = array();
$arrayPos = array();

if (isset($idEje)) {
    $query = "SELECT maestros.nombre, curso.nom_curs, cur_prof.id
        FROM maestros 
        INNER JOIN cur_prof ON maestros.id = cur_prof.id_prof 
        INNER JOIN curso ON cur_prof.id_cur = curso.id ";
}
$registro = $conn->prepare($query);
$registro->execute();
?>

<?php require_once('./components/header.php') ?>
<main id="mainContainer">
    <div class="mainContainer grid">
        <?php while (($resultado = $registro->fetch(PDO::FETCH_ASSOC))): ?>

            <div class="item" curId="<?php echo $resultado['id'] ?>">
                <div class="itemImgContainer">
                    <?php echo $resultado['nom_curs'] ?>
                </div>
                <div class="itemInfContainer">
                    <!--  <p class="temNomCur"> nombre de curso:----- </p> -->
                    <p class="temProfesor">
                        <?php echo 'profesor: ' . $resultado['nombre'] ?>
                    </p>
                    <a href="nuevo-curso-a.php?idCur=<?php echo $resultado['id'] ?>&idAlu=<?php echo $idEje ?>" class="btn btn-warning" style="color: black">
                        inscribete
                </a>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</main>
<dialog id="nuevoCurso">
    <div class="nuevoCurso">
        <div class="ncMensaje">
            <p id="ncMensaje"> Agregar como nuevo curso</p>
        </div>
        <div class="ncAcciones">
              <button id="btnConfirmar">confirmar</button>
             
            <form action="">
                <input type="submit" value="">
            </form>
            <a href="nuevo-curso.php?curId=<?php echo $cursoId ?>" class="btn" style="color: black">
                confirmar
            </a>
            <button id="btnCancelar">cancelar</button>
        </div>
    </div>
</dialog>
<?php require_once('./components/footer.php') ?>


<style>
    #nuevoCurso::backdrop {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .nuevoCurso {
        height: 20vh;
        width: 21rem;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        border: 0px;
    }

    dialog:modal {
        background-color: whitesmoke;
        color: black;
    }

    .nuevoCurso p {
        font-size: medium;
        font-weight: normal;
    }

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

    const btncursos = document.querySelectorAll('#item')
    const dialogNC = document.getElementById('nuevoCurso')
    const btnNCConfirm = document.getElementById('btnConfirmar')
    const btnNCCancel = document.getElementById('btnCancelar')
    const ncMensaje = document.getElementById('ncMensaje')


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

        //setTimeout(() => {
        //console.log('ancho => ', elementoGrid.offsetWidth , ' @@ num cols ', numCols , 'porcentajecol', porcentajeCols , 'gap', gap)

        requestAnimationFrame(animacionGrid)
        //},)

    }

    window.addEventListener('DOMContentLoaded', () => {
        requestAnimationFrame(animacionGrid)

    })




</script>