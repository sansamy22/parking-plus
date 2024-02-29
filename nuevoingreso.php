<?php
$nombrePagina = "Nuevo Ingreso";
include 'plantilla.php';
include 'header.php'; 
include 'conexionbasedatos.php';

// verificar si ha enviado el formulario 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //capturar los datos del formulario 
    $tipoVehiculo = $_POST["tipoVehiculo"];
    $marca = $_POST["marca"];
    $color = $_POST["color"];
    $placa = $_POST["placa"];
    $observaciones = $_POST["observaciones"];


    //armar la consulta SQL para la insercion 
    $insertar = "INSERT INTO vehiculos (tipoVehiculo, marca, color, placa, observaciones)
  VALUES ('$tipoVehiculo', '$marca', '$color', '$placa', '$observaciones') ";

    //ejecutar la consulta 
    if ($conexion->query($insertar) === TRUE) {
        //redirigis a archivo exito.php despues de la insercion de la bd
        header("Location: exito.php"); 
        exit;
    } else {
        echo "Error: " . $insertar . "<br>" . $conexion->error;
    }

    //cerrar la conexion 
    $conexion->close();
}
?>

<div class="contenedor-nuevo-ingreso">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="nuevoIngreso" method="post">
        <h3>Informacion del Vehiculo</h3>

        <div class="control-form">
            <label>Tipo de Vehiculo</label><br />
            <select name="tipoVehiculo">
                <option value="carro">Carro</option>
                <option value="moto">Moto</option>
                <option value="otro">Otro</option>
            </select>
        </div>
        <div class="control-form">
            <label>Marca:</label>
            <input type="text" id="marca" name="marca" />
        </div>
        <div class="control-form">
            <label>Color:</label>
            <input type="text" id="Color" name="color" />
        </div>
        <div class="control-form">
            <label>Placa:</label>
            <input type="text" id="Placa" name="placa" />
        </div>
        <div class="control-form">
            <label>Obsevaciones:</label>
            <input type="text" id="Obsevaciones" name="observaciones" />
        </div>
        <button class="botonNuevoVehiculo" type="submit">Ingresar Vehiculo</button>
    </form>
</div>

<?php include 'footer.php'; ?>