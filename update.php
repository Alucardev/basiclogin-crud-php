<?php


session_start();

if(isset($_SESSION['nombre']) and $_SESSION['rol'] == 'Administrador'){
    if(isset($_POST['update'])){

        include('db.php');
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $autor  =  $_POST['autor'];
        $rutaimagen = $_POST['imgpath'];

        $query = "UPDATE book SET precio = '$precio', autor = '$autor',  titulo = '$titulo', img = '$rutaimagen' WHERE id = $id";
        $consulta = mysqli_query($conexion, $query);
        if($consulta){
            $_SESSION['message'] = 'Libro editado.';
            $_SESSION['message_type'] = 'success';
            header('Location: crud_page.php');
        }else{
            $_SESSION['message'] = 'Error al actualizar libro.';
            $_SESSION['message_type'] = 'danger';
            header('Location: crud_page.php');
        }  
    }
}
?>
