<?php
    include("../conexion.php");

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM cliente WHERE Id_cliente = $id";
            $resultado = mysqli_query($conn, $query);

            if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $nidentidad=$row['Numero_Documento'];
            $tDocumento=$row['Tipo_documento'];
            $nombre1=$row['Nombre1'];
            $nombre2=$row['Nombre2'];
            $apellido1=$row['Apellido1'];
            $apellido2=$row['Apellido2'];
            $direccion=$row['Direccion'];
            $telefono=$row['Telefono'];


        }
    }

    if(isset($_POST['actualizar'])){
      $id = $_GET['id'];
      $nidentidad=$_POST['numeroIdentificacion'];
      $tDocumento=$_POST['tipoDocumento'];
      $nombre1=$_POST['nombre1'];
      $nombre2=$_POST['nombre2'];
      $apellido1=$_POST['apellido1'];
      $apellido2=$_POST['apellido2'];
      $direccion=$_POST['direccion'];
      $telefono=$_POST['telefono'];


        $query = "UPDATE cliente SET Numero_Documento = '$nidentidad', Tipo_documento = '$tDocumento',Nombre1 = '$nombre1',Nombre2 = '$nombre2',Apellido1 = '$apellido1',Apellido2 = '$apellido2',Direccion = '$direccion',Telefono = '$telefono' WHERE Id_cliente = $id";


        $resultado = $conn->query($query);
        header('Location: registroCliente.php');
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Informacion Clientes</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="registroCliente.php" class="navbar-brand"> EDITAR CLIENTE </a>
        </div>
</nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="form-group">
                              <label>N° Indentificacion</label>
                              <input type="number" name="numeroIdentificacion" class="form-control" value="<?php echo $nidentidad; ?>" placeholder="Actualizar Numero">
                              <label>Tipo de documento </label>
                              <input type="text" name="tipoDocumento" class="form-control" value="<?php echo $tDocumento; ?>" placeholder="Actualizar Documento">
                              <label>Primer Nombre </label>
                              <input type="text" name="nombre1" class="form-control" value="<?php echo $nombre1; ?>" placeholder="Actualizar Primer Nombre">
                              <label>Segundo Nombre </label>
                              <input type="text" name="nombre2" class="form-control" value="<?php echo $nombre2; ?>" placeholder="Actualizar Segundo Nombre">
                              <label>Primer Apellido</label>
                              <input type="text" name="apellido1" class="form-control" value="<?php echo $apellido1; ?>" placeholder="Actualizar Primer Apellido">
                              <label>Segundo Apellido</label>
                              <input type="text" name="apellido2" class="form-control" value="<?php echo $apellido2; ?>" placeholder="Actualizar Segundo Apellido">
                              <label>Direccion </label>
                              <input type="text" name="direccion" class="form-control" value="<?php echo $direccion; ?>" placeholder="Actualizar direccion">
                              <label>Telefono </label>
                              <input type="number" name="telefono" class="form-control" value="<?php echo $telefono; ?>" placeholder="Actualizar telefono"><br>
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
