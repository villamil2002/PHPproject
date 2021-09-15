<?php
    include("../conexion.php");

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM vehiculo WHERE id_vehiculo = $id";
            $resultado = mysqli_query($conn, $query);

            if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $matricula=$row['Matricula'];
            $modelo=$row['Modelo'];
            $color=$row['Color'];
            $idcliente=$row['id_Cliente'];




        }
    }

    if(isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $numeroMatricula=$_POST['numeroMatricula'];
        $modelo=$_POST['modelo'];
        $color=$_POST['color'];
        $idCliente=$_POST['idCliente'];



        $query = "UPDATE vehiculo SET Matricula = '$numeroMatricula', Modelo = '$modelo',Color = '$color',id_Cliente ='$idcliente' WHERE id_vehiculo = $id";

        $resultado = $conn->query($query);
        header('Location: vehiculo.php');
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Informacion Vehiculos</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="editar.php" class="navbar-brand"> EDITAR VEHICULO </a>
        </div>
</nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="form-group">

                                <label>Numero de matricula</label>
                                <input type="number" name="numeroMatricula" class="form-control" value="<?php echo $matricula; ?>" placeholder="Actualizar Matricula">
                                <label>Modelo</label>
                                <input type="text" name="modelo" class="form-control" value="<?php echo $modelo; ?>" placeholder="Actualizar Modelo">
                                <label>Color </label>
                                <input type="text" name="color" class="form-control" value="<?php echo $color; ?>" placeholder="Actualizar Color">
                                <label>Cliente </label>
                                <input type="text" name="idCliente" class="form-control" value="<?php echo $idcliente; ?>" placeholder="Actualizar Cliente"><br>

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
