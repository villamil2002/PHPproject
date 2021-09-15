<?php
   include '../conexion.php';

    if(isset($_POST['guardar'])){


        $idRepuesto=$_POST['idRepuesto'];
        $descripcion=$_POST['descripcion'];
        $cantidad=$_POST['cantidad'];
        $precioUnit=$_POST['precioUnit'];

        $query="INSERT INTO repuesto (Descripcion,Cantidad,Precio_unitario) VALUES ('$descripcion','$cantidad','$precioUnit')";
        $resultadoauto= mysqli_query($conn,$query);

        if(!$resultadoauto){
            die("Falla");

        }
        $_SESSION['message']= 'Informacion guardada';
        $_SESSION['message_type']= 'warning';
        header("Location: repuesto.php");
    }
?>
