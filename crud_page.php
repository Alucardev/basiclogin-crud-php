<?php session_start()?>
<?php if(isset($_SESSION['nombre']) and $_SESSION['rol'] == 'Administrador'){ ?>
<?php include('includes/header.php');?>

<body>

<?php include('includes/navbar.php');?>



<div  style="background-color: #eeeeee;" id="layoutSidenav_content">

            <main class="container-fluid px-4">
                    <h1 class="mt-4">Panel de Administrador</h1>
                    <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Herramienta para crear, actualizar y eliminar libros en la tienda.</li>
                        </ol>

                        <?php if (isset($_SESSION['message'])) { ?>
                            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                                <?= $_SESSION['message']?>
                            </div>
                            <?php unset($_SESSION['message_type']); 
                                    unset($_SESSION['message']);
    
                         } ?>
                    <div class="row">
                        <div class="col-md-4">
                                <div style="background-color: white;" class="card card-body p-4">
                                    <div class="card-header"><h5 class="text-center font-weight-light my-1">Agregar libro</h5></div>
                                    <form action="create.php" method="POST">
                                    <div class="form-group p-2">
                                      
                                        <input type="text" name="title" class="form-control" id="libronombre" placeholder="Nombre de libro" autofocus>
                                     
                                    </div>
                                    <div class="form-group p-2">
    
                                        <input type="text" name="author" class="form-control" placeholder="Autor del libro" id="libroautor" autofocus>
                                        
                                    </div>
                                    <div class="form-group p-2">
                                    
                                        <input type="text" name="imgpath" class="form-control" placeholder="Ruta de imgagen" id="rutaimagenlibro" autofocus>
                                    </div>
                                    <div class="form-group p-2">
                                    
                                    <input type="text" name="price" class="form-control" placeholder="Precio" id="Precio" autofocus>
                                    </div>
                                    <div class="mt-4 mb-0">
                                    <input type="submit" name="save_book" class="btn btn-primary btn-block" value="Guardar Libro">
                                    </div>

                       
                                    </form>
                                </div>
                        </div>


                        <div class="col-md-8">
                        <table style="background-color: white;" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Autor</th>
                                <th>Precio</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                include("db.php");
                                
                                $query = "SELECT * FROM book";
                                $result_books = mysqli_query($conexion, $query);

                                while($row = mysqli_fetch_assoc($result_books)) { ?>
                                <tr>
                                <td><?php echo $row['titulo']?></th>
                                <td><?php echo $row['autor']?></th>
                                <td>$<?php echo $row['precio']?></th>
                                <td> 
                                <a href="update_page.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                                <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                                </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                        </div>
                    </div>
                </main>
                <?php  include("includes/footer.php")?>
        </div>
    </div>
    </body>
</html>


<?php
}
else{
    $_SESSION['message'] = 'Por favor ingresa tus datos para acceder al contenido..';
    $_SESSION['message_type'] = 'danger';
    header('Location: login_page.php');
}
?>



