
<?php

include("../conexion.php");
echo $_GET['id'];

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  echo $id;
  $query = "DELETE FROM cliente WHERE id_Cliente = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed");
  }
  $_SESSION['message'] = 'Eliminacion correcta';
  $_SESSION['message_type'] = 'danger';
  header('Location: registroCliente.php');
}

?>
