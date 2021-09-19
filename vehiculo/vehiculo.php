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
            <a href="vehiculo.php" class="navbar-brand">INFORMACION VEHICULO</a>
            <a role="button" href="../inicio_1.php" class="btn btn-success btn-sm">Salir</a>
        </div>
    </nav>
<?php include("../conexion.php"); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <div class="card card-body">
        <form action="guardar.php" method="POST">
          <div class="form-group">
                        <label>Numero de matricula</label>
                        <input type="number" name="numeroMatricula" class="form-control">
                        <label>Modelo</label>
                        <input type="text" name="modelo" class="form-control">
                        <label>Color </label>
                        <input type="text" name="color" class="form-control">
                        <label>Cliente </label>
                        <select type="text" name="idCliente" class="form-control">
                          <option hidden selected value="">--Seleccione Orden Parte--</option>
                          <?php
                            $queryOrdenparte = "SELECT * FROM cliente order by Numero_Documento asc";
                            $resultado_Ordenparte= mysqli_query($conn, $queryOrdenparte);
                            foreach ($resultado_Ordenparte as $valores):
                                echo '<option value="'.$valores["Id_cliente"].'">'.$valores["Numero_Documento"].'</option>';
                            endforeach;
                           ?>
                        </select>

          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Guardar">

        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
          <th>ID</th>
            <th>Numero de matricula</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Cliente</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT v.*, c.Numero_Documento FROM vehiculo v inner join cliente c on v.id_Cliente = c.Id_cliente";
          $resultado_vehiculo = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($resultado_vehiculo)) { ?>
          <tr>
            <td><?php echo $row['id_vehiculo']; ?></td>
            <td><?php echo $row['Matricula']; ?></td>
            <td><?php echo $row['Modelo']; ?></td>
            <td><?php echo $row['Color']; ?></td>
            <td><?php echo $row['Numero_Documento']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id_vehiculo']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['id_vehiculo']?>" class="btn btn-danger">
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
