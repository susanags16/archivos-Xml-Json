<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "crudbasico";
// Creamos la conexion
$conexion = mysqli_connect ($server, $user, $pass, $bd) 
or die ("Ha sucedido un error inexperado en la conexion de la base de datos");

// generamos la consulta
$sql = "SELECT * FROM contactos";
mysqli_set_charset ($conexion, "utf8"); // formato de datos utf8

if (!$result = mysqli_query ($conexion, $sql)) die ();

$usuarios = array (); // creamos un array
while ($row = mysqli_fetch_array ($result)) 
{ 	
	$id = $row ['id'];
	$nombre = $row ['nombre'];
	$telefono = $row ['telefono'];
	$email = $row ['email'];
	
	$contactos [] = array ('id' => $id, 'nombre' => $nombre, 'telefono' => $telefono,
						'email' => $email);

}
	
// desconectamos la base de datos
$close = mysqli_close ($conexion) 
or die ("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

// Creamos el JSON
$json_string = json_encode ($contactos);
echo $json_string;


