<?php
   include '../conexion.php';

    if(isset($_POST['guardar'])){


        $matricula=$_POST['numeroMatricula'];
        $modelo=$_POST['modelo'];
        $color=$_POST['color'];
        $idCliente=$_POST['idCliente'];

        $query="INSERT INTO vehiculo (Matricula,Modelo,color,id_Cliente) VALUES ('$matricula','$modelo','$color','$idCliente')";
        $resultadoauto= mysqli_query($conn,$query);

        if(!$resultadoauto){
            die("Falla");

        }
        $_SESSION['message']= 'Informacion guardada';
        $_SESSION['message_type']= 'success';
        header("Location: vehiculo.php");
    }
?>
