<?php
session_start();
$con = new mysqli('localhost','root','','piscicultura');

$usuario = $_REQUEST['email'];
$pwd = $_REQUEST['pwd'];

$sql = "SELECT  * FROM admin WHERE usuario = '$usuario' AND contrasena ='$pwd'";

echo $sql;

$query = $con->query($sql);
$cant = $query->num_rows;

echo $cant;
if ($cant > 0){
 
 $_SESSION['user']=$usuario;
  
    header("location:index.php?");
}
else {
    echo ' <script> alert("datos ingresados son erroneos"); window.location.href="login.php" </script>';
}
?>