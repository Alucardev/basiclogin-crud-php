<?php
session_start();
include('db.php');

if (isset($_POST['save_book']) and $_SESSION['rol'] == 'Administrador') {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $price = $_POST['price'];
  $imgpath = $_POST['imgpath'];
  $query = "INSERT INTO book (titulo, precio, autor, img) VALUES ('$title', '$price', '$author', '$imgpath')"; 
  $result = mysqli_query($conexion, $query);


  if(!$result) {
    $_SESSION['message'] = 'Ha ocurrido un error al crear el libro.';
    $_SESSION['message_type'] = 'danger';
    header('Location: crud_page.php');
  }else{
      $_SESSION['message'] = 'Libro Agregado con exito';
      $_SESSION['message_type'] = 'success';
      header('Location: crud_page.php');
  }
}

?>