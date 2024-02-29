<?php 
    $nombrePagina = "Parqueados"; 
    include 'plantilla.php'; 
    include 'header.php';
    include 'conexionbasedatos.php'; 

//consultar vehiculos parqwueados 
$vehiculosParqueados = "SELECT * FROM vehiculos WHERE estado = 'parqueado'"; 
$resultado = $conexion->query($vehiculosParqueados); 

// obtener los datos  como un array multidimencional 
$vehiculos = $resultado->fetch_all(MYSQLI_ASSOC); 

?> 
<h3 style="padding-left: 2rem;">Vehiculos Parqueados</h3>
<div class="contenedor-listado-parqueados">
    

    <table class="tabla">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Ingreso</th>
            </tr>
        </thead>
        <?php 

        if(!empty($vehiculos)) {
            foreach($vehiculos as $vehiculo) {
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
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'> No hay vehiculos parqueados </td> </tr>"; 
        }
        ?> 
        
    </table>

</div>

<?php include 'footer.php'; ?>