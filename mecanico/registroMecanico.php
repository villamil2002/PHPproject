<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Informacion Mecanicos</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="registroMecanico.php" class="navbar-brand">REGISTRO DE MECANICO</a>
            <a style="margin-left: 740px" role="button" href="../inicio_1.php" class="btn btn-success btn-sm">Salir</a>
            <a type="button" href="registroMecanico.php" class="btn btn-secondary btn-sm">Cancelar</a>
        </div>
    </nav>
<?php include '../conexion.php';?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
<!--Mensaje-->
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>


            <div class="card card-body">
                <form action="guardar.php" method="POST">
                <session>INFORMACION MECANICO</session>
                    <div class ="form-group">

                        <label>N° Indentificacion</label>
                        <input type="number" name="numeroIdentificacion" class="form-control">
                        <label>Tipo de documento </label>
                        <input type="text" name="tipoDocumento" class="form-control">
                        <label>Primer Nombre </label>
                        <input type="text" name="nombre1" class="form-control">
                        <label>Segundo Nombre </label>
                        <input type="text" name="nombre2" class="form-control">
                        <label>Primer Apellido </label>
                        <input type="text" name="apellido1" class="form-control">
                        <label>Segundo Apellido </label>
                        <input type="text" name="apellido2" class="form-control">
                        <label>Direccion </label>
                        <input type="text" name="direccion" class="form-control">
                        <label>Telefono </label>
                        <input type="number" name="telefono" class="form-control"><br>

                    </div>
                    <center>
                        <input type="submit" class="btn btn-success" value="Guardar" name="guardar">
                     </center>
                </form>
            </div>
        </div>
        
        <div class="col-md-8">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numero Indentificacion</th>
                        <th>Tipo de documento</th>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                     </tr>
                </thead>
                <tbody>
                    <?php
                    $query= "SELECT * FROM mecanico";
                    $resultado_cliente = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($resultado_cliente)) { ?>
                       <tr>
                            <td><?php echo $row['Id_Mecanico']; ?></td>
                           <td><?php echo $row['Numero_Documento']; ?></td>
                           <td><?php echo $row['Tipo_documento']; ?></td>
                           <td><?php echo $row['Nombre1']; ?></td>
                           <td><?php echo $row['Nombre2']; ?></td>
                           <td><?php echo $row['Apellido1']; ?></td>
                           <td><?php echo $row['Apellido2']; ?></td>
                           <td><?php echo $row['Direccion']; ?></td>
                           <td><?php echo $row['Telefono']; ?></td>
                           <td>
                             <div style="display: flex">
                              <a href="editar.php?id=<?php echo $row['Id_Mecanico'] ?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                              </a>
                              <a href="eliminar.php?id=<?php echo $row['Id_Mecanico'] ?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                              </a>
                            </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>
