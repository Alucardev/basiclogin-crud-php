<?php
session_start();
include("db.php");


if(isset($_GET['id']) and $_SESSION['rol'] == 'Administrador') {

  $id = $_GET['id'];
  $query = "DELETE FROM book WHERE id = $id";
  $result = mysqli_query($conexion, $query);

  if(!$result) {
    $_SESSION['message'] = 'Ha ocurrido un error al eliminar el libro';
    $_SESSION['message_type'] = 'danger';
    header('Location: crud_page.php');
  }else {
    $_SESSION['message'] = 'Libro Eliminado';
    $_SESSION['message_type'] = 'success';
    header('Location: crud_page.php');
  }
}

?>