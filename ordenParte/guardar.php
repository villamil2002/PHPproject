<?php
   include '../conexion.php';

    if(isset($_POST['guardar'])){


        $idOrdenParte=$_POST['id'];
        $cantidad=$_POST['cantidad'];
        $idRepuesto=$_POST['repuesto'];
        $idMecanico=$_POST['mecanico'];

        $query="INSERT INTO ordenparte (Cantidad,Id_Repuesto,Id_mecanico) VALUES ('$cantidad','$idRepuesto','$idMecanico')";
        $resultadoauto= mysqli_query($conn,$query);

        if(!$resultadoauto){
            die("Falla");

        }
        $_SESSION['message']= 'Informacion guardada';
        $_SESSION['message_type']= 'warning';
        header("Location: ordenparte.php");
    }
?>
