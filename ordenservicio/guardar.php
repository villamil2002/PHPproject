<?php
   include '../conexion.php';

    if(isset($_POST['guardar'])){


        $idOrdenServicio=$_POST['Id_servicio'];
        $fecha=$_POST['fecha'];
        $cliente=$_POST['cliente'];
        $vehiculo=$_POST['vehiculo'];
        $ordenparte=$_POST['ordenparte'];

        echo $fecha;
        echo $cliente;
        echo $vehiculo;
        echo $ordenparte;
        echo $idOrdenServicio;
        

        $query="SELECT ordenservicio (Fecha_registro,Id_cliente,id_vehiculo,Id_OrdenParte)"; //VALUES ('$fecha','$cliente','$vehiculo','$ordenparte')
        $resultadoservicio= mysqli_query($conn,$query);

        if(!$resultadoservicio){
            die("Falla");

        }
        $_SESSION['message']= 'Informacion guardada';
        $_SESSION['message_type']= 'warning';
        header("Location: ordenservicio.php");
    }
?>
