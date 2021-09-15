<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Informacion Repuestos</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="repuesto.php" class="navbar-brand">INFORMACION VEHICULO</a>
            <a style="margin-left: 740px" role="button" href="../inicio_1.php" class="btn btn-success btn-sm">Salir</a>
            <a type="button" href="repuesto.php" class="btn btn-secondary btn-sm">Cancelar</a>
        </div>
    </nav>
<?php include("../conexion.php"); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <div class="card card-body">
      <session>INFORMACION REPUESTO</session>
        <form action="guardar.php" method="POST">
          <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" name="descripcion" class="form-control">
                        <label>Cantidad </label>
                        <input type="text" name="cantidad" class="form-control">
                        <label>Precio unitario</label>
                        <input type="text" name="precioUnit" class="form-control">

          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>ID</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM repuesto";
          $resultado_repuesto= mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($resultado_repuesto)) { ?>
          <tr>
            <td><?php echo $row['Id_Repuesto']; ?></td>
            <td><?php echo $row['Descripcion']; ?></td>
            <td><?php echo $row['Cantidad']; ?></td>
            <td><?php echo $row['Precio_unitario']; ?></td>

            <td>
              <a href="editar.php?id=<?php echo $row['Id_Repuesto']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['Id_Repuesto']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>
