
<?php

include("../conexion.php");
echo $_GET['id'];

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  echo $id;
  $query = "DELETE FROM mecanico WHERE Id_Mecanico = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed");
  }
  $_SESSION['message'] = 'Eliminacion correcta';
  $_SESSION['message_type'] = 'danger';
  header('Location: registroMecanico.php');
}

?>
