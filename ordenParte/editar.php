<?php
    include("../conexion.php");

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "select op.Id_OrdenParte,op.Cantidad,r.Descripcion,concat(m.Nombre1,' ',m.Nombre2,' ',m.Apellido1,' ',m.Apellido2) Nombre_mecanico
                      from ordenparte op inner join repuesto r on op.Id_Repuesto = r.Id_Repuesto inner join mecanico m on op.Id_mecanico = m.Id_Mecanico WHERE op.Id_OrdenParte = $id";

            $resultado = mysqli_query($conn, $query);
            if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $idOrdenParte=$row['Id_OrdenParte'];
            $cantidad=$row['Cantidad'];
            $descripcion=$row['Descripcion'];
            $nombreMecanico=$row['Nombre_mecanico'];

        }
    }

    if(isset($_POST['actualizar'])){
        $idOrdenParte = $_GET['id'];
        $cantidad=$_POST['cantidadrep'];
        $descripcion=$_POST['descRepuesto'];
        $nombreMecanico=$_POST['mecanicoAsig'];

        $query = "UPDATE ordenparte SET Cantidad = '$cantidad', Id_Repuesto = '$descripcion',Id_mecanico = '$nombreMecanico' WHERE Id_OrdenParte = $id";
        echo $query ;
        $resultado = $conn->query($query);
        header('Location: OrdenParte.php');
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="editar.php" class="navbar-brand"> EDITAR ORDEN PARTE</a>
        </div>
</nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="form-group">

                                <label>ID Orden parte</label>
                                <input type="number" name="idOrdenParte" class="form-control" value="<?php echo $id; ?>" disabled>
                                <label>Cantidad repuesto</label>
                                <input type="text" name="cantidadrep" class="form-control" value="<?php echo $cantidad; ?>" placeholder="Actualizar Descripcion">
                                <label>Descripcion repuesto </label>
                                <select type="text" name="descRepuesto" class="form-control">
                                  <option value="">--Seleccione un repuesto--</option>
                                  <?php
                                    $queryRepuestos = "SELECT * FROM repuesto";
                                    $resultado_repuesto= mysqli_query($conn, $queryRepuestos);
                                    foreach ($resultado_repuesto as $valores):
                                        echo '<option value="'.$valores["Id_Repuesto"].'">'.$valores["Descripcion"].'</option>';
                                    endforeach;
                                   ?>
                                </select>
                                <label>Mecanico Asignado </label>
                                <select type="text" name="mecanicoAsig" class="form-control">
                                  <option value="">--Asigne un Mecanico--</option>
                                  <?php
                                    $queryRepuestos = "SELECT * FROM mecanico";
                                    $resultado_repuesto= mysqli_query($conn, $queryRepuestos);
                                    foreach ($resultado_repuesto as $valores):
                                        echo '<option value="'.$valores["Id_Mecanico"].'">'.$valores["Nombre1"].' '.$valores["Apellido1"].'</option>';
                                    endforeach;
                                   ?>
                                </select>
                                <br>

                            </div>
                            <button class="btn btn-success btn-block" name="actualizar">
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
