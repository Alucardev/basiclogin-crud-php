<?php

    session_start();
    
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $nombre= $_POST['nombre'];
    $apellido = $_POST['apellido'];

    include("db.php");

     
    if($email and $password and $nombre and $apellido){
		$consulta=mysqli_query($conexion, "SELECT email FROM user WHERE email='$email'");
		$resultado = mysqli_num_rows($consulta);
        if($resultado!=0){
			$respuesta=mysqli_fetch_array($consulta);
            mysqli_free_result($consulta);
            $_SESSION['message'] = 'Ya existe una cuenta vinculada a este correo.';
            $_SESSION['message_type'] = 'danger';
            header("location:register_page.php");
		}
        else{
            $consulta=mysqli_query($conexion, "INSERT INTO `user` (`id`, `email`, `password`, `rol`, `nombre`, `apellido`) VALUES (NULL, '$email', '$password', 'User' , '$nombre', '$apellido')");
            if($consulta){
                $_SESSION['message'] = 'Registro con exito, ingresa tus datos para continuar.';
                $_SESSION['message_type'] = 'success';
                header("location:login_page.php");
            } 
            mysqli_free_result($consulta);
        }
    }else{
        $_SESSION['message'] = 'Debes completar todos los campos.';
        $_SESSION['message_type'] = 'danger';
        header("location:register_page.php");
    }
?>