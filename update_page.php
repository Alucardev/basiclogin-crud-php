<?php session_start()?>
<?php if(isset($_SESSION['nombre']) and $_SESSION['rol'] == 'Administrador'){ 

include('includes/header.php');
include("db.php");
$title  = '';
$price = '';
$imgpath  = '';
$author =   '';


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM book WHERE id=$id";
  $result = mysqli_query($conexion, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $title = $row['titulo'];
    $price = $row['precio'];
    $author = $row['autor'];
    $imgpath = $row['img'];

  }
}




include('includes/navbar.php');

?>

<body>

<div id="layoutSidenav_content">
  <div class="container p-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card card-body">
        <div class="card-header"><h5 class="text-center font-weight-light my-1">Actualizar libro</h5></div>
        <form action="update.php" method="POST">
        <div class="form-group p-2">

        <form action="update.php" method="POST">
            <div class="form-group p-2">
              <input name="id" type="hidden" class="form-control" value="<?php echo $_GET['id'] ; ?>" placeholder="Actualizar titulo">
            </div>
             <div class="form-group p-2">
              <input name="titulo" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Actualizar titulo">
            </div>
            <div class="form-group p-2">
            <input name="autor" type="text" class="form-control" value="<?php echo $author; ?>" placeholder="Actualizar autor">
            </div>
            <div class="form-group p-2">
              <input name="imgpath" type="text" class="form-control" value="<?php echo $imgpath; ?>" placeholder="Actualizar ruta de imagen">
            </div>
            <div class="form-group p-2">
              <input name="precio" type="text" class="form-control" value="<?php echo $price; ?>" placeholder="Actualizar precio">
            </div>
              <input  name="update" class="btn btn-primary" type="submit" value="Ingresar"/>	
        </form>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</body>

<?php }
else{
    $_SESSION['message'] = 'Por favor ingresa tus datos para acceder al contenido..';
    $_SESSION['message_type'] = 'danger';
    header('Location: login_page.php');
}
?>






