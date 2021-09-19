<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Informacion Orden Servicio</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="ordenservicio.php" class="navbar-brand">ORDEN DE SERVICIO</a>
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
                        <label>Fecha</label>
                        <input type="date" id="fecha" name="fecha" class="form-control" value="<?php echo date("Y-m-d");?>">
                        <label>Cliente </label>
                        <select type="text" name="cliente" class="form-control">
                          <option value="">--Seleccione un Cliente--</option>
                          <?php
                            $queryCliente = "SELECT * FROM cliente";
                            $resultado_Cliente= mysqli_query($conn, $queryCliente);
                            foreach ($resultado_Cliente as $valores):
                                echo '<option value="'.$valores["Id_cliente"].'">'.$valores["Nombre1"]. ' ' .$valores["Apellido1"].'</option>';
                            endforeach;
                           ?>
                        </select> 
                        <label>Vehiculo </label>
                        <select type="text" name="vehiculo" class="form-control">
                          <option value="">--Seleccione un Vehiculo--</option>
                          <?php
                            $queryVehiculo = "SELECT * FROM vehiculo";
                            $resultado_Vehiculo= mysqli_query($conn, $queryVehiculo);
                            foreach ($resultado_Vehiculo as $valores):
                                echo '<option value="'.$valores["id_vehiculo"].'">'.$valores["Matricula"].'</option>';
                            endforeach;
                           ?>
                        </select>
                        <label>Orden Parte </label>
                        <select type="text" name="ordenparte" class="form-control">
                          <option value="">--Seleccione Orden Parte--</option>
                          <?php
                            $queryOrdenparte = "SELECT * FROM ordenparte";
                            $resultado_Ordenparte= mysqli_query($conn, $queryOrdenparte);
                            foreach ($resultado_Ordenparte as $valores):
                                echo '<option value="'.$valores["Id_OrdenParte"].'">'.$valores["Id_OrdenParte"].'</option>';
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
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Vehiculo</th>
            <th>Orden Parte</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "select os.Id_servicio,os.Id_ordenParte,os.Fecha_registro,v.Matricula,
          m.Numero_Documento,m.Nombre1,m.Apellido1,
          r.Descripcion,r.Cantidad,r.Precio_unitario,
          c.Numero_Documento,c.Nombre1,c.Apellido1,c.Direccion
          from ordenparte op
          inner join  mecanico m on op.Id_mecanico = m.Id_Mecanico 
          inner join repuesto r on op.Id_Repuesto = r.Id_Repuesto
          inner join ordenservicio os on os.Id_ordenParte = op.Id_OrdenParte
          inner join vehiculo v on os.id_vehiculo = v.id_vehiculo
          inner join cliente c on v.id_Cliente = c.Id_cliente";
          $query= "WHERE os.Id_servicio =: idServicio";
          $resultado_ordenservicio= mysqli_query($conn, $query);
          $resultado_ordenservicio->bindValue("idServicio","1");
          $resultado_ordenservicio->execute();

          while($row = mysqli_fetch_assoc($resultado_ordenservicio)) { ?>
          <tr>
            <td><?php echo $row['Id_servicio']; ?></td>
            <td><?php echo $row['Fecha_registro']; ?></td>
            <td><?php echo $row['Nombre_Cliente']; ?></td>
            <td><?php echo $row['Matricula'];?></td>
            <td><?php echo $row['Id_OrdenParte']; ?></td>

            <td>
              <a href="editar.php?id=<?php echo $row['Id_servicio']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['Id_servicio']?>" class="btn btn-danger">
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
