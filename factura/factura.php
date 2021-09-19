<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Informacion Mecanicos</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
   <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="registroMecanico.php" class="navbar-brand">REGISTRO DE FACTURA</a>
            <a role="button" href="../inicio_1.php" class="btn btn-success btn-sm">Salir</a>
        </div>
    </nav>
<?php include '../conexion.php';?>

<div class="container p-4">
    <div class="row">

<!--Mensaje-->
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>
        </div>



        <div class="col-md-8">
            <table class="table table-striped table-hover" id="table">
          <form action="Filtrar.php">
            </select>
            <label>Factura cliente</label>
            <div style="text-align: right;">
            <select type="text" name="factura" class="form-control">
              <option value="">--Seleccione cliente--</option>
              <?php
                $queryRepuestos = "select c.Numero_Documento documento_cliente
                                  ,concat(c.Nombre1,' ',c.Apellido1) nombre_cliente
                                  from ordenparte op
                                  inner join  mecanico m on op.Id_mecanico = m.Id_Mecanico
                                  inner join repuesto r on op.Id_Repuesto = r.Id_Repuesto
                                  inner join ordenservicio os on os.Id_ordenParte = op.Id_OrdenParte
                                  inner join vehiculo v on os.id_vehiculo = v.id_vehiculo
                                  inner join cliente c on v.id_Cliente = c.Id_cliente
                                  group by c.Numero_Documento
                                  		,c.Nombre1
                                      ,c.Apellido1";
                $resultado_repuesto= mysqli_query($conn, $queryRepuestos);
                foreach ($resultado_repuesto as $valores):
                    echo '<option value="'.$valores["documento_cliente"].'">CC.: '.$valores["documento_cliente"].' - '.$valores["nombre_cliente"].'</option>';
                endforeach;
               ?>
            </select>
            <button style="float: left;">Generar factura</button>
          </div>
          <br>
          <br>
          </form>
                <thead><br>
                    <tr>
                        <th>ID Orden Parte</th>
                        <th>Fecha registro servicio</th>
                        <th>Matricula Vehiculo</th>
                        <th>CC. mecanico</th>
                        <th>Nombre Mecanico</th>
                        <th>Descripción respuestos</th>
                        <th>Cantidad repuestos</th>
                        <th>Precio repuestos</th>
                        <th>CC. Cliente</th>
                        <th>Nombre Cliente</th>
                        <th>Direccion Cliente</th>
                     </tr>
                </thead>
                <tbody>
                    <?php
                    $query= "select os.Id_ordenParte
                        	  ,os.Fecha_registro
                              ,v.Matricula matricula_vehiculo
                              ,m.Numero_Documento documento_mecanico
                              ,concat(m.Nombre1,' ',m.Apellido1) nombre_mecanico
                              ,r.Descripcion,r.Cantidad,r.Precio_unitario
                              ,c.Numero_Documento documento_cliente
                              ,concat(c.Nombre1,' ',c.Apellido1) nombre_cliente
                              ,c.Direccion dirrecion_cliente
                        from ordenparte op
                        inner join  mecanico m on op.Id_mecanico = m.Id_Mecanico
                        inner join repuesto r on op.Id_Repuesto = r.Id_Repuesto
                        inner join ordenservicio os on os.Id_ordenParte = op.Id_OrdenParte
                        inner join vehiculo v on os.id_vehiculo = v.id_vehiculo
                        inner join cliente c on v.id_Cliente = c.Id_cliente";
                    $resultado_cliente = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($resultado_cliente)) { ?>
                       <tr>
                            <td><?php echo $row['Id_ordenParte']; ?></td>
                           <td><?php echo $row['Fecha_registro']; ?></td>
                           <td><?php echo $row['matricula_vehiculo']; ?></td>
                           <td><?php echo $row['documento_mecanico']; ?></td>
                           <td><?php echo $row['nombre_mecanico']; ?></td>
                           <td><?php echo $row['Descripcion']; ?></td>
                           <td><?php echo $row['Cantidad']; ?></td>
                           <td><?php echo $row['Precio_unitario']; ?></td>
                           <td><?php echo $row['documento_cliente']; ?></td>
                           <td><?php echo $row['nombre_cliente']; ?></td>
                           <td><?php echo $row['dirrecion_cliente']; ?></td>

                        </tr>
                    <?php } ?>
                </tbody>

            </table>
            <form>
              <button onclick="exportTableToExcel('table')">Exportar Ordenes de servicio</button>
            </form>
        </div>
    </div>
</div>
<script>
function exportTableToExcel(tableID, filename = 'factura'){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}

</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
</html>
