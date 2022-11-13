<?php session_start();?>
<?php if(isset($_SESSION['nombre'])){?>
<?php include('includes/header.php');?>
    <body class="sb-nav-fixed">
    <?php include('includes/navbar.php');?>
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-3">
                        <div class="container text-center" style="padding: 3vh;">
                            <h2 style="padding-bottom: 2vh;" class="mt-4">Tus libros favoritos en un solo lugar!</h2>
                            <ol>
                                <form action="login.php" method="post">
                                    <div class="input-group">
                                        <input type="search" class="form-control rounded" placeholder="Que libro estas buscando?" aria-label="Search" aria-describedby="search-addon" />
                                        <input class="btn btn-outline-primary" type="submit" value="Buscar"/>	   
                                    </div>
                                </form>
                            </ol>
                        </div>

                     <div class="container">
                                <div class="row">
                                        <?php
                                        include("db.php");     
                                        $query = "SELECT * FROM book ";
                                        $result_books = mysqli_query($conexion, $query);
                                        while($row = mysqli_fetch_assoc($result_books)) { ?>
                                            <div class="col-xl-3 col-md-6 mb-4">
                                                <div class="card border-0 shadow">
                                                    <div class="card-img-actions" style="height: 16rem;">
                                                    <img src="img/<?php echo $row['img'] ?>.jpg" class="card-img img-fluid"  width="96" height="350" alt="...">
                                                    </div>
                                                    <div class="card-body text-center" style="height: 6rem;">
                                                            <p class="card-title mb-0"><?php echo $row['titulo']?></p>
                                                            <p class="card-text text-black-50"><?php echo $row['autor']?></p>  
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <p class="card-text text-black-50">$<?php echo $row['precio']?></p> 
                                                        <button type="button" class="btn btn-success">Comprar</button>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php } ?>  
                             </div>
                      </div>                   
                 </div>
            </main>
        </div>
    </div>
 </body>
</html>


<?php }
else{
    header('Location: login_page.php');
}
?>
