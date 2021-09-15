<?php
   include '../conexion.php';

    if(isset($_POST['guardar'])){

    //    $idCliente =$_POST['idCliente'];
        $nidentidad=$_POST['numeroIdentificacion'];
        $tDocumento=$_POST['tipoDocumento'];
        $nombre1=$_POST['nombre1'];
        $nombre2=$_POST['nombre2'];
        $apellido1=$_POST['apellido1'];
        $apellido2=$_POST['apellido2'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];

        $query="INSERT INTO mecanico(Numero_Documento,Tipo_documento,Nombre1,Nombre2,Apellido1,Apellido2,Direccion,Telefono) VALUES ('$nidentidad','$tDocumento','$nombre1','$nombre2','$apellido1','$apellido2','$direccion','$telefono')";
        $resultado= mysqli_query($conn,$query);

        if(!$resultado){
            die("Falla");

        }
        $_SESSION['message']= 'Informacion guardada';
        $_SESSION['message_type']= 'warning';
        header("Location: registroMecanico.php");
    }
?>
