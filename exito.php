<?php

$nombrePagina ="Ingreso correcto";

include 'plantilla.php'; 
include 'header.php';

?>

<div class="mensaje-exito">
    <h3>Ingreso OK del vehiculo</h3>
    <p>El nuevo vehiculo ha sido ingresado correctamente</p>
</div>

<?php include 'footer.php'; ?> 

<script>
    //redirigir automaticamente despues de 2 segundos 
    setTimeout( function () {
        window.location.href = "nuevoingreso.php";
    }, 2000);
</script>