<?php
$nombrePagina = "Reporte Diario"; 
include 'plantilla.php';
include 'header.php';
include 'conexionbasedatos.php';

//consultar los vehiculos retirados
$consulta = "SELECT * FROM vehiculos WHERE estado = 'retirado'";
$resultado = $conexion->query($consulta);

$totalRecaudado = "SELECT SUM(valorCobrado) AS totalPlata FROM vehiculos";
$total = $conexion->query($totalRecaudado);

$fila = $total->fetch_assoc(); 
$totalPlata = $fila['totalPlata'];

?>


<div class="informacion-titulo">
    <h3 style="padding-left: 2rem;">Salida Vehiculos</h3>
    <h3 style="padding-left: 2rem;">Total Cobrado
    <?php echo $totalPlata; ?>
    <!-- Aqui va la variable con la suma de la plata -->
    </h3>
</div>
    
<div class="contenedor-reportes">
    <table class="tabla">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Ingreso</th>
                <th>Salida</th>
                <th>Valor Cobrado</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if(!empty($resultado)) {
            foreach($resultado as $vehiculo) {
                echo "<tr>"; 
                echo "<td>";
                if($vehiculo["tipoVehiculo"] == "carro") { 
                    echo "<i class='fa-solid fa-car'></i>"; 
                } elseif ($vehiculo["tipoVehiculo"] == "moto") {
                    echo "<i class='fa-solid fa-motorcycle'></i>";
                } else {
                    echo "<i class='fa-solid fa-bullseye'></i>";
                } 

                echo $vehiculo["placa"] . "</td>"; 

                echo "<td>" . $vehiculo["fechaHoraIngreso"] . "</td>";
                echo "<td>" . $vehiculo["fechaHoraSalida"] . "</td>";
                echo "<td>" . $vehiculo["valorCobrado"] . "</td>"; 
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'> No hay vehiculos retirados </td> </tr>"; 
        }
        ?> 
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>