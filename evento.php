<?php
include('conexion.php');

$accion = $_GET['accion'] ?? '';

switch ($accion) {

  // 📅 Listar eventos
  case 'listar':
    $sql = "SELECT * FROM eventos";
    $resultado = $conexion->query($sql);
    $eventos = [];
    while ($fila = $resultado->fetch_assoc()) {
      $eventos[] = $fila;
    }
    echo json_encode($eventos);
    break;

  // ➕ Agregar evento
  case 'agregar':
    $titulo = $_POST['title'];
    $inicio = $_POST['start'];
    $fin = $_POST['end'];

    $sql = "INSERT INTO eventos (title, start, end) VALUES ('$titulo', '$inicio', '$fin')";
    $conexion->query($sql);
    echo json_encode(['success' => true]);
    break;

  // ❌ Eliminar evento
  case 'eliminar':
    $id = $_POST['id'];
    $sql = "DELETE FROM eventos WHERE id = $id";
    $conexion->query($sql);
    echo json_encode(['success' => true]);
    break;
}
?>
