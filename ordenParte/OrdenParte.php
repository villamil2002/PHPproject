<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Informacion Orden Parte</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="OrdenParte.php" class="navbar-brand">ORDEN DE PAGO</a>
            <a style="margin-left: 740px" role="button" href="../inicio_1.php" class="btn btn-success btn-sm">Salir</a>
            <a type="button" href="OrdenParte.php" class="btn btn-secondary btn-sm">Cancelar</a>
        </div>
    </nav>
<?php include("../conexion.php"); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <div class="card card-body">
      <session>INFORMACION ORDEN PARTE</session>
        <form action="guardar.php" method="POST">
          <div class="form-group">
                        <label>Cantidad repuesto seleccionado</label>
                        <input type="text" name="cantidad" class="form-control">
                        <label>Repuesto </label>
                        <select type="text" name="repuesto" class="form-control">
                          <option value="">--Seleccione un repuesto--</option>
                          <?php
                            $queryRepuestos = "SELECT * FROM repuesto";
                            $resultado_repuesto= mysqli_query($conn, $queryRepuestos);
                            foreach ($resultado_repuesto as $valores):
                                echo '<option value="'.$valores["Id_Repuesto"].'">'.$valores["Descripcion"].'</option>';
                            endforeach;
                           ?>
                        </select>
                        <label>Mecanico</label>
                        <select type="text" name="mecanico" class="form-control">
                          <option value="">--Asigne un Mecanico--</option>
                          <?php
                            $queryRepuestos = "SELECT * FROM mecanico";
                            $resultado_repuesto= mysqli_query($conn, $queryRepuestos);
                            foreach ($resultado_repuesto as $valores):
                                echo '<option value="'.$valores["Id_Mecanico"].'">'.$valores["Nombre1"].' '.$valores["Apellido1"].'</option>';
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
            <th>Cantidad</th>
            <th>Repuesto</th>
            <th>Mecanico Solicitante</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "select op.Id_OrdenParte,op.Cantidad,r.Descripcion,concat(m.Nombre1,' ',m.Nombre2,' ',m.Apellido1,' ',m.Apellido2) Nombre_mecanico
                    from ordenparte op inner join repuesto r on op.Id_Repuesto = r.Id_Repuesto inner join mecanico m on op.Id_mecanico = m.Id_Mecanico";
          $resultado_ordenparte= mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($resultado_ordenparte)) { ?>
          <tr>
            <td><?php echo $row['Id_OrdenParte']; ?></td>
            <td><?php echo $row['Cantidad']; ?></td>
            <td><?php echo $row['Descripcion'];?>
            </td>
            <td><?php echo $row['Nombre_mecanico']; ?></td>

            <td>
              <a href="editar.php?id=<?php echo $row['Id_OrdenParte']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?id=<?php echo $row['Id_OrdenParte']?>" class="btn btn-danger">
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
