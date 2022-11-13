<?php
session_start();
$name=$_POST['nombre'];
$email=$_POST['email'];
$comment=$_POST["comentario"];
$destino="mail@mail.com";
$body="Nombre: ".$nombre." Email: ".$email. " Mensaje: ".$comentario;
$header="From: ".$nombre."<".$email.">";

$send= mail($email,"E-Library Contact",$body,$header);
if($send == true){
    $_SESSION['message'] = 'Su mensaje fue enviado.';
    $_SESSION['message_type'] = 'success';
    header("location:contact_page.php");
}else{
    $_SESSION['message'] = 'Oops ha ocurrido un error al enviar el mensaje.';
    $_SESSION['message_type'] = 'danger';
    header("location:contact_page.php");
}
?>