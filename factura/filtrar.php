<?php
   include '../conexion.php';
   $doccliente=$_GET['factura'];
?>

<table class="table table-striped table-hover" id="table">
        <form>  </select>
        <label><h1>Factura cliente<h1></label>
        <div style="text-align: right;">
        </div>
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
                    <th>Precio Total</th>
                    <th>CC. Cliente</th>
                    <th>Nombre Cliente</th>
                    <th>Direccion Cliente</th>
                 </tr>
            </thead>
            <tbody>
                <?php
                $total="select sum(Precio_unitario * r.Cantidad) sum_precio_total
                        ,sum(Precio_unitario * r.Cantidad * 0.5) mano_obra
                        ,sum((Precio_unitario * r.Cantidad * 0.5)+ (Precio_unitario * r.Cantidad)) total_pagar
                        from ordenparte op
                        inner join  mecanico m on op.Id_mecanico = m.Id_Mecanico
                        inner join repuesto r on op.Id_Repuesto = r.Id_Repuesto
                        inner join ordenservicio os on os.Id_ordenParte = op.Id_OrdenParte
                        inner join vehiculo v on os.id_vehiculo = v.id_vehiculo
                        inner join cliente c on v.id_Cliente = c.Id_cliente
                        where c.Numero_Documento='$doccliente'
                        order by r.Descripcion
    		               ,os.Fecha_registro asc";
              $resultado_total = mysqli_query($conn, $total);
              while($row = mysqli_fetch_array($resultado_total))
              {
                $precioTotal = $row['sum_precio_total'];
                $manoobra =$row['mano_obra'];
                $totalpagar= $row['total_pagar'];
              }


                $query= "select os.Id_ordenParte
                        ,os.Fecha_registro
                          ,v.Matricula matricula_vehiculo
                          ,m.Numero_Documento documento_mecanico
                          ,concat(m.Nombre1,' ',m.Apellido1) nombre_mecanico
                          ,r.Descripcion
                          ,r.Cantidad
                          ,r.Precio_unitario
                          ,(Precio_unitario * r.Cantidad) precio_total_prod
                          ,c.Numero_Documento documento_cliente
                          ,concat(c.Nombre1,' ',c.Apellido1) nombre_cliente
                          ,c.Direccion dirrecion_cliente
                    from ordenparte op
                    inner join  mecanico m on op.Id_mecanico = m.Id_Mecanico
                    inner join repuesto r on op.Id_Repuesto = r.Id_Repuesto
                    inner join ordenservicio os on os.Id_ordenParte = op.Id_OrdenParte
                    inner join vehiculo v on os.id_vehiculo = v.id_vehiculo
                    inner join cliente c on v.id_Cliente = c.Id_cliente
                    where c.Numero_Documento='$doccliente'
                    order by r.Descripcion
							,os.Fecha_registro asc";

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
                       <td><?php echo $row['precio_total_prod']; ?></td>
                       <td><?php echo $row['documento_cliente']; ?></td>
                       <td><?php echo $row['nombre_cliente']; ?></td>
                       <td><?php echo $row['dirrecion_cliente']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                  <td class="left" colspan="4">Total Gastos Repuestos:</td><td class="right"><?php echo $precioTotal;?></td>
              </tr>
              <tr>
                  <td class="left" colspan="4">Mano obra mecanico:</td><td class="right"><?php echo $manoobra;?></td>
              </tr>
              <tr>
                  <td class="left" colspan="4">Total a pagar:</td><td class="right"><?php echo $totalpagar;?></td>
              </tr>
            </tfoot>
        </table id="table">
        <br>
        <button style="float: left;" onclick="exportTableToExcel('table')">Exportar Factura</button>

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
