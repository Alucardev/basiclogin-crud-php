<?php 

$email = $_POST['email'];
$password = $_POST['password'];



session_start();

if($email == null or $password == null){

		$_SESSION['message'] = 'Debes completar todo los campos.';
		$_SESSION['message_type'] = 'danger';
		header("location:login_page.php");
}

else{
		include("db.php");
		$password = md5($_POST['password']);
		$consulta=mysqli_query($conexion, "SELECT nombre, apellido, email , rol FROM user WHERE email='$email' AND password='$password'");
		$resultado = mysqli_num_rows($consulta);
	
		if($resultado!=0){
			$respuesta=mysqli_fetch_array($consulta);
			$_SESSION['nombre']=$respuesta['nombre'];
			$_SESSION['apellido']=$respuesta['apellido'];
			$_SESSION['rol']=$respuesta['rol'];
			header("location:index.php");
		}
		else{
			
			$_SESSION['message'] = 'Usuario o contraseña incorrectos.';
			$_SESSION['message_type'] = 'danger';
			header("location:login_page.php");
		}
		mysqli_close($conexion);
}

?>

