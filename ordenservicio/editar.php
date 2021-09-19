<?php
    include("../conexion.php");

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM ordenservicio WHERE Id_servicio = $id";
            $resultado = mysqli_query($conn, $query);

            if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $fecharegisto=$row['Fecha_registro'];
            $idvehiculo=$row['id_vehiculo'];
            $idorden=$row['Id_ordenParte'];

        }
    }

    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $fecharegisto=$_POST['fecharegisto'];
        $idvehiculo=$_POST['idvehiculo'];
        $idorden=$_POST['idorden'];




        $query = "UPDATE ordenservicio SET Fecha_registro = '$fecharegisto', id_vehiculo = '$idvehiculo',Id_OrdenParte = '$idorden' WHERE Id_servicio = $id";

        $resultado = $conn->query($query);
        header('Location: ordenservicio.php');
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Informacion orden de servicio</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="editar.php" class="navbar-brand"> EDITAR ORDEN DE SERVICIO </a>
        </div>
</nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">  
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="form-group">

                                <label>Fecha de registro</label>
                                <input type="date" name="fecharegisto" class="form-control" value="<?php echo $matricula; ?>">
                                <label>Vehiculo</label>
                                 </select>
                                 <select type="text" name="idvehiculo" class="form-control">
                                   <option value="">--Seleccione un vehiculo--</option>
                                   <?php
                                     $queryRepuestos = "SELECT * FROM vehiculo";
                                     $resultado_repuesto= mysqli_query($conn, $queryRepuestos);
                                     foreach ($resultado_repuesto as $valores):
                                         echo '<option value="'.$valores["id_vehiculo"].'">'.$valores["Matricula"].'</option>';
                                     endforeach;
                                    ?>
                                 </select>
                                 <label>Orden Parte </label>
                                 <select type="text" name="ordenparte" class="form-control">
                                   <option value="">--Seleccione Orden Parte--</option>
                                   <?php
                                     $queryOrdenparte = "select o.*,r.descripcion,concat(m.Nombre1,' ',m.Apellido1) nombre_mecanico
                                                         FROM ordenparte o
                                                         inner join  repuesto r on o.Id_Repuesto = r.Id_Repuesto
                                                         inner join mecanico m on o.Id_mecanico = m.Id_Mecanico order by o.Id_OrdenParte asc";
                                     $resultado_Ordenparte= mysqli_query($conn, $queryOrdenparte);
                                     foreach ($resultado_Ordenparte as $valores):
                                         echo '<option value="'.$valores["Id_OrdenParte"].'">'.'ID Orden: '.$valores["Id_OrdenParte"].'- Cantidad: '.$valores["Cantidad"].'- Repuesto: '.$valores["descripcion"].'- Mecanico: '.$valores["nombre_mecanico"].'</option>';
                                     endforeach;
                                    ?>
                                 </select>
                            </div>
                            <button class="btn btn-success  btn-block " name="actualizar">
                                Actualizar
                             </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>
