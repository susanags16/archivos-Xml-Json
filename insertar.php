<?php
include("conexion.php");
$con=conectar();

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];


$sql="INSERT INTO contactos VALUES('$id','$nombre','$telefono','$email')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: contactos.php");
    
}else {
}
?>