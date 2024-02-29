<?php include 'plantilla.php'; ?>
    <div class="contenedor">
        <div class="contenedor-logo">
            <!--este es el logo-->
            <i class="fa-solid fa-square-parking rojo" style="font-size: 4rem;"></i> 
            
            <h1>
                <span class="gris-oscuro">Parking</span>
                <span class="rojo">Plus</span>
            </h1>
        </div>

        <div class="contenedor-formulario">
            <p style="text-align: center; color: var(--grisOscuro);">Ingreso al sistema</p>
            <form>
                <label style="font-weight: bold;">Usuario</label>
                <input type="text" id="Usuario" />

                <label style="font-weight: bold;">Clave</label>
                <input type="password" id="Clave" />

                <button>Ingresar</button>
            </form>
        </div> 
        <p>&copy;Samy Passu - SystemPlus Popayán</p>
    </div> 

    <script>
        function ingresarAlSistema() {
            const inputUsuario = document.getElementById('usuario');
            const inputClave = document.getElementById('clave'); 

            if(inputUsuario.value == "samy" && inputClave.value == 123456) {
                alert("puedes ingresar al sistema");
            } else {
                alert("No estas autorizado a ingrear");
            }
        }
    </script> 
    <button onclick="ingrearAlSistema()">
</body>
</html> 