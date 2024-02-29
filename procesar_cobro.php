<?php
//verificar si se recibieron los datos necesarios 

if (isset($_POST['placa'], $_POST['totalPagar'])) {

    //obteber los datos del formulario 
    $placa = $_POST['placa'];
    $totalPagar = $_POST['totalPagar'];

    //realizar cualquier variacion adicional si es necesario 

    // Aquí pondrías tu lógica para actualizar la base de datos con la salida del vehículo
    // Por ejemplo, una consulta SQL para actualizar el estado, fechaHoraSalida y valorCobro en la tabla vehiculos
    // Ten en cuenta que este es solo un ejemplo y debes adaptarlo a tu estructura de base de datos

    //incluir la conexion de la base de datos
    include 'conexionbasedatos.php';

    $placa = $conexion->real_escape_string($placa);
    $totalPagar = $conexion->real_escape_string($totalPagar);

    //actualizar el registro en la base de datos 
    $consulta = "UPDATE vehiculos SET fechaHoraSalida = NOW(), estado = 'retirado', valorCobrado = '$totalPagar' WHERE placa = '$placa' AND estado = 'parqueado'";

    if ($conexion->query($consulta) === TRUE) {
        echo '<div class="verde">Cobro realizado correctamente. </div>';
    } else {
        echo "Error al realizar el cobro: " . $conexion->error;
    }

    //cerrar la conexion
    $conexion->close();
} else {
    //si no se recibieron los datos necesarios, mostrar un mesaje de error
    echo "Error: No se recibieron los datos necesarios para procesar el cobro.";
}
?>


<script>
    //redirigor automaticamente despues de 2 segundos
    setTimeout( function() {
        window.location.href = "salidaVehiculos.php";
    }, 2000);
</script>