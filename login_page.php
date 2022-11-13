<!DOCTYPE html>
<?php session_start()?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                                    <?= $_SESSION['message']?>
                                </div>
                                <?php unset($_SESSION['message_type']); 
                                        unset($_SESSION['message']);
                                
                                } ?>
                                    <div class="card-body">
                                        <form action="login.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="emailInput" name="email" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Correo electronico</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="passwordInput" type="password" name="password" placeholder="Password" />
                                                <label for="inputPassword">Contraseña</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Recuperar contraseña</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Olvidaste tu contraseña?</a>
                                                <input  class="btn btn-primary" type="submit" value="Ingresar"/>	
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register_page.php">No tenes cuenta? Registrate gratis!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>




            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Agustin Aiello 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
