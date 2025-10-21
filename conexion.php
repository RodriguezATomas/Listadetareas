<?php
$host = "localhost";
$usuario = "root";
$contraseña = "";
$baseDatos = "materias"; // o el nombre que uses

$conexion = new mysqli($host, $usuario, $contraseña, $baseDatos);

if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}
?>
