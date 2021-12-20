<?php

include("conexion.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM contactos  WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: contactos.php");
    }
?>
