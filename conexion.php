<?php session_start();

$servername = "192.168.20.28";
$username = "taller";
$password = "desa";
$dbname = "taller";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if  (!$conn){
    die (" Conexion fallida: " . mysqli_connect_error());
}
echo "";
?>
