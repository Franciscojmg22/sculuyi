<footer>
    <div id="footer" class="footer">
        footer
    </div>
</footer>
</body>

</html>

<script>
    const menuToggle = document.getElementById('menu')
    const sidebar = document.getElementById('sidebar')
    const content = document.getElementById('mainContainer')
    const header = document.getElementById('header')
    const footer = document.getElementById('footer')

    const sideElements = document.getElementById('sd')

    window.addEventListener('DOMContentLoaded', () => {
        if (localStorage.getItem('panelActivo')) {

        }
    })

    menuToggle.addEventListener('click', function () {
        sidebar.classList.toggle('show-sidebar')
        content.classList.toggle('mainContainer-shift')
        header.classList.toggle('header-shift')
        if (localStorage.getItem('panelActivo')){
            localStorage.setItem('panelActivo', false)
        } else {
            localStorage.setItem('panelActivo', true)
        }
        
    })

    sideElements.addEventListener('click', e => {
        const clickedElement = event.target
        const id = clickedElement.id
        if (id != 'sd') {
            const url = './' + id + '.php'
            console.log('Esta es la url ', url)
            window.location.href = url

        } else {
            console.log('no ha id ')
        }

    })
</script>