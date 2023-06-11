<?php require_once('./components/header.php') ?>
<main id="mainContainer">
    <div class="mainContainer grid">
        <div class="item">One</div>
        <div class="item">Two</div>
        <div class="item">Three</div>
        <div class="item">Four</div>
        <div class="item">Five</div>
        <div class="item">Six</div>
        <div class="item">One</div>
        <div class="item">Two</div>
        <div class="item">Three</div>
        <div class="item">Four</div>
        <div class="item">Five</div>
        <div class="item">Six</div>
    </div>
</main>
<?php require_once('./components/footer.php') ?>

<style>
    .grid {
        border: 2px solid orange;
        width: 100%;
        max-height: 100%;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(20vw, 20vw));
        grid-template-rows: repeat(auto-fit, minmax(20vh, 20vh));
        row-gap: 4vh;


    }

    .item {
        border: 1px solid black;
        height: 100%;
        width: 20vw;
    }
</style>

<script>
    const main = document.getElementById('mainContainer')
        const elementoGrid = document.querySelector('.grid')
    const animacionGrid = () => {
        

        const vw = window.innerWidth / 100
        const mingap = 30
        let anchoGrid = elementoGrid.offsetWidth 
        //let numCols = Math.floor(mingap + Math.sqrt(mingap*mingap + 4*((20*vw+mingap)*anchoGrid) ) / (2*mingap) ) 
        let numCols = Math.floor( anchoGrid / (vw * 20 + 30) ) 
        let numGaps = numCols - 1
        let porcentajeCols = (numCols * 20 * vw * 100) /anchoGrid
        let gap = Math.floor( (100 - porcentajeCols) / 3 )

        elementoGrid.style.columnGap = gap + '%'

        setTimeout(() => {
            console.log('ancho => ', elementoGrid.offsetWidth , ' @@ num cols ', numCols , 'porcentajecol', porcentajeCols , 'gap', gap)

            requestAnimationFrame(animacionGrid)
        }, 500)
        
    }

    window.addEventListener('DOMContentLoaded', () => {
        requestAnimationFrame(animacionGrid)
    })

    
</script>
