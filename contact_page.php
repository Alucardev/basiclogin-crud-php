<?php session_start()?>
<?php if(isset($_SESSION['nombre'])){ ?>
<?php include('includes/header.php');?>

<body>

<?php include('includes/navbar.php');?>



<div  style="background-color: #eeeeee;" id="layoutSidenav_content">

            <main>
            <div class="container">
                        <div class="row justify-content-center p-4">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5" style="padding: 2vh; ">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Contacto</h3></div>
                                    <div class="card-body">
                                            <?php if (isset($_SESSION['message'])) { ?>
                                        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                                            <?= $_SESSION['message']?>
                                        </div>
                                        <?php unset($_SESSION['message_type']); 
                                                unset($_SESSION['message']);
                                        
                                        } ?>
                                        <form action="sendcontact.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="emailInput" name="email" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Correo electronico de contacto</label>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <input  class="btn btn-primary" type="submit" value="Enviar"/>	
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
    header('Location: login_page.php');
}
?>



