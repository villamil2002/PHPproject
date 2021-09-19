<?php
   include '../conexion.php';

    if(isset($_POST['guardar'])){


        $fecha=$_POST['fecha'];
        $cliente=$_POST['cliente'];
        $vehiculo=$_POST['vehiculo'];
        $ordenparte=$_POST['ordenparte'];

        $query="INSERT INTO ordenservicio (Fecha_registro,id_vehiculo,Id_OrdenParte) VALUES (now(),'$vehiculo','$ordenparte')";
        $resultadoauto= mysqli_query($conn,$query);

        if(!$resultadoauto){
            die("Falla");

        }
        $_SESSION['message']= 'Informacion guardada';
        $_SESSION['message_type']= 'success';
        header("Location: ordenservicio.php");
    }
?>
