<footer>
    <div id="footer" class="footer">
    Todos los Derechos Reservados Sculuyi ©
    </div>
</footer>
</body>

<dialog id="noLoginDialog">
    <div class="noLoginDialog">
        <p>Inicie de sesion para acceder</p>
    </div>
</dialog>

</html>

<style>
    #noLoginDialog::backdrop {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .noLoginDialog {
        height: 20vh;
        width: 21rem;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        border: 0px;

    }

    .noLoginDialog p {
        font-size: 22px;
        font-weight: bold;
    }

    dialog:modal {
        background-color: #046bb4;
        color: whitesmoke;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: none;
        border: 0px;
    }
</style>

<script>
    const menuToggle = document.getElementById('menu')
    const sidebar = document.getElementById('sidebar')
    const content = document.getElementById('mainContainer')
    const header = document.getElementById('header')
    const footer = document.getElementById('footer')
    const noLoginDialog = document.getElementById('noLoginDialog')

    const sideElements = document.getElementById('sd')

    const nombreUsuario = document.getElementById('nombreUsuario')

    window.addEventListener('DOMContentLoaded', () => {
        localStorage.removeItem('sculuyiId')
        
        //localStorage.setItem('sculuyiId', 1)
    })

    menuToggle.addEventListener('click', function () {
        sidebar.classList.toggle('show-sidebar')
        content.classList.toggle('mainContainer-shift')
        header.classList.toggle('header-shift')
        if (localStorage.getItem('panelActivo')) {
            localStorage.setItem('panelActivo', false)
        } else {
            localStorage.setItem('panelActivo', true)
        }

    })

    sideElements.addEventListener('click', e => {
        const clickedElement = event.target
        const id = clickedElement.id
        if (id != 'sd') {

            <?php if(!isset($_SESSION['user_id'])):?>
                noLoginDialog.showModal()

                setTimeout(() => {
                    noLoginDialog.close()
                }, 1600)
            <?php else: ?>

                const url = './' + id + '.php'
                console.log('Esta es la url ', url)
                window.location.href = url
             
                <?php endif ?>



        } else {
            console.log('no ha id ')
        }

    })
</script>