<?php
    include("../conexion.php");

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM repuesto WHERE Id_Repuesto = $id";
            $resultado = mysqli_query($conn, $query);

            if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $idRepuesto=$row['Id_Repuesto'];
            $descripcion=$row['Descripcion'];
            $cantidad=$row['Cantidad'];
            $precioUnitario=$row['Precio_unitario'];

        }
    }

    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $descripcion=$_POST['descripcion'];
        $cantidad=$_POST['cantidad'];
        $precioUnit=$_POST['precioUnit'];



        $query = "UPDATE repuesto SET Descripcion = '$descripcion', Cantidad = '$cantidad',Precio_unitario = '$precioUnit' WHERE Id_Repuesto = $id";

        $resultado = $conn->query($query);
        header('Location: repuesto.php');
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Informacion repuesto</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="editar.php" class="navbar-brand"> EDITAR REPUESTO </a>
        </div>
</nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="form-group">

                                <label>ID Repuesto</label>
                                <input type="number" name="idRepuesto" class="form-control" value="<?php echo $id; ?>" disabled>
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>" placeholder="Actualizar Descripcion">
                                <label>Cantidad </label>
                                <input type="text" name="cantidad" class="form-control" value="<?php echo $cantidad; ?>" placeholder="Actualizar cantidad">
                                <label>Precio Unitario </label>
                                <input type="text" name="precioUnit" class="form-control" value="<?php echo $precioUnitario; ?>" placeholder="Actualizar Precio Unitario"><br>

                            </div>
                            <button class="btn btn-success" name="actualizar">
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
