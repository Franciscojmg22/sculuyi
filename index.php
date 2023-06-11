<?php require_once('./components/header.php') ?>
<main id="mainContainer">
    <div class="mainContainer grid">

    </div>
</main>

<template id="temCursos">
    <div class="item">
        <div class="itemImgContainer">
            Aplicaciones de internet
        </div>
        <div class="itemInfContainer">
            <p class="temNomCur"> nombre de curso:----- </p>
            <p class="temProfesor"> profesor: ------- </p>
        </div>
    </div>
</template>

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
    }

    .itemImgContainer{
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

    .itemInfContainer{
        height: 7vh;
        min-height: 7vh;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
        background-color: white;
    }

    .itemInfContainer p{
        margin-block: 2px;
    }
</style>

<script>
    const main = document.getElementById('mainContainer')
    const elementoGrid = document.querySelector('.grid')
    const temCursos = document.getElementById('temCursos').content
    const fragment = document.createDocumentFragment()


    const animacionGrid = () => {
        const vw = window.innerWidth / 100
        const mingap = 30
        let anchoGrid = elementoGrid.offsetWidth 
        //let numCols = Math.floor(mingap + Math.sqrt(mingap*mingap + 4*((20*vw+mingap)*anchoGrid) ) / (2*mingap) ) 
        let numCols = Math.floor( anchoGrid / (vw * 20 + 30) ) 
        let numGaps = numCols - 1
        let porcentajeCols = (numCols * 20 * vw * 100) /anchoGrid
        let gap = Math.floor( (100 - porcentajeCols) / numGaps )

        elementoGrid.style.columnGap = gap + '%'

        setTimeout(() => {
            console.log('ancho => ', elementoGrid.offsetWidth , ' @@ num cols ', numCols , 'porcentajecol', porcentajeCols , 'gap', gap)

            requestAnimationFrame(animacionGrid)
        }, 500)
        
    }

    window.addEventListener('DOMContentLoaded', () => {
        requestAnimationFrame(animacionGrid)
        
        const ejemploTemplete = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

        ejemploTemplete.forEach(element => {
            temCursos.querySelector('.temNomCur').textContent = 'Nombre de curso: '
            temCursos.querySelector('.temProfesor').textContent = 'Profesor: '

            const clone = temCursos.cloneNode(true)
            fragment.appendChild(clone)
            elementoGrid.appendChild(fragment)
        })
    })



    
</script>
